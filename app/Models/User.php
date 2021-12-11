<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    static $default_thumbnail_url = '/user/img/default-thumbnail.jpg';

    public function scopeSearch($query,$request)
    {    if ($request->has("key")) {

        if ($request->key != null) {
            $query->where('email', 'LIKE', '%' . $request->key . '%')
                ->orwhere('phone', 'LIKE', '%' . $request->key . '%');
        }
    }

        return $query;
    }
    public function scopeTrash($query,$request)
    {    if ($request->has("delete")) {

        if ($request->delete == 1) {
            $query->onlyTrashed();
        }
    }

        return $query;
    }
    public function scopeLevel($query,$request)
    {    if ($request->has("admin")) {

        if ($request->admin != null) {
            $query->where('level', '=',$request->admin);

        }
    }

        return $query;
    }
    public function scopeStatus($query,$request)
    {    if ($request->has("status")) {

        if ($request->status != null) {
            $query->where('status', '=',$request->status);

        }
    }

        return $query;
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $primaryKey = 'id';
    protected $fillable = [
        'email',
        'phone',
        'password',
        'level',
        'device_token',
        'status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(){
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }

    public function orders(){
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function getDefaultThumbnailAttribute()
    {
        $thumbnail = User::$default_thumbnail_url;
        if ($this->profile->thumbnail != null) {
            return $this->profile->thumbnail;
        }
        return $thumbnail;
    }
}
