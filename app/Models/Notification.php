<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'read_at'];

    public function scopeToSingleDevice($sToken=null, $title=null, $body=null, $icon, $click_action){
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($body)
            ->setSound('default')
            ->setBadge($this->where('read_at', null)->count())
            ->setIcon($icon)
            ->setClickAction($click_action);

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $token = $sToken;

        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();

        $downstreamResponse->tokensToDelete();

        $downstreamResponse->tokensToModify();

        $downstreamResponse->tokensToRetry();

        $downstreamResponse->tokensWithError();
    }

    public function scopeToMultiDevice($query, $model, $title, $body, $icon, $click_action){
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($body)
            ->setSound('default')
            ->setBadge($this->where('read_at', null)->count())
            ->setIcon($icon)
            ->setClickAction($click_action);

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => $model->pluck('device_token')->toArray()]);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $tokens = $model->pluck('device_token')->toArray();

        $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();

        $downstreamResponse->tokensToDelete();

        $downstreamResponse->tokensToModify();

        $downstreamResponse->tokensToRetry();

        $downstreamResponse->tokensWithError();
    }

    public function scopeRead(){
        return $this->where('read_at', null)->get();
    }

    public function scopeNumberAlert(){
        return $this->where('read_at', null)->count();
    }
}