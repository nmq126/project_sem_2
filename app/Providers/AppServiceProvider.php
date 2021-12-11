<?php

namespace App\Providers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class   AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // dùng asset load bị lỗi do http
        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }

        view()->composer('*',function ($view){

            $shoppingCart = [];
            if (Session::has('shoppingCart')) {
                $shoppingCart = Session::get('shoppingCart');
            }
            $totalQuantity = 0;
            foreach ($shoppingCart as $cartItem){
                $totalQuantity += $cartItem->quantity;
            }

            $user_id = null;
            if (Auth::check()){
                $user_id = Auth::user()->id;
            }
            $number_noti = Notification::where('user_id', $user_id)
                                        ->where('read_at', null)
                                        ->count();

            $notifications = Notification::where('user_id', $user_id)->latest('id')->limit(5)->get();

            $data = [
                'user_id' => $user_id,
                'totalQuantity' => $totalQuantity,
                'number_noti' => $number_noti,
                'notifications' => $notifications
            ];
            $view->with($data);
        });

//        View::share('numberAlert', Notification::numberAlert());
    }
}
