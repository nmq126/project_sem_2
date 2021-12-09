<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

/**
 * @method static find($ordersID)
 */
class Order extends Model
{

    use HasFactory,SoftDeletes;
    public function scopeTrash($query,$request)
    {    if ($request->has("trash")) {

        if ($request->trash == 1) {
            $query->onlyTrashed();
        }
    }

        return $query;
    }
    public function scopeSearch($query,$request)
    {    if ($request->has("key")) {

        if ($request->key != null) {
            $query->where('ship_name', 'LIKE', '%' . $request->key . '%');
        }
    }

        return $query;
    }
    public function scopeAddress($query,$request)
    {    if ($request->has("address")) {

        if ($request->address != null) {
            $query->where('ship_address', 'LIKE', '%' . $request->address . '%');
        }
    }

        return $query;
    }
    public function scopePhone($query,$request)
    {    if ($request->has("phone")) {

        if ($request->phone != null) {
            $query->where('ship_phone', 'LIKE', '%' . $request->phone . '%');
        }
    }

        return $query;
    }
    public function scopeStatus($query,$request)
    {
        if ($request->has("statusz")) {
            if ($request->statusz != null) {
                if ($request->statusz == -1){
                    $query->where('status', '=', 1)
                        ->orwhere('status','=',0)
                        ->orwhere('status','=',2)
                        ->orwhere('status','=',3)
                        ->orwhere('status','=',4)
                        ->orwhere('status','=',-2);
                }else{
                    $query->where('status', '=', $request->statusz);
                }
            }
        }
        return $query;
    }
    public function scopeCheckout($query,$request)
    {
        if ($request->has("checkoutz")) {
            if ($request->checkoutz != null) {
               if ($request->checkoutz ==2){
                   $query->where('checkout', '=', 1)->orwhere('checkout','=',0);
               }else{
                   $query->where('checkout', '=', $request->checkoutz);
               }
            }
        }
        return $query;
    }
    public function scopeProduct($query,$request)
    {
        if ($request->has("product")) {
            if ($request->product != 0) {
                $array = [];
                $orders_id = OrderDetail::where("product_id","=",$request->product)->get();
                for ($i = 0; $i <  sizeof($orders_id) ; $i++) {

                    array_push( $array,$orders_id[$i]->order_id);

                }
               $query->whereIn('id', $array);
            }

        }
        return $query;
    }
    public function scopeStartDate($query,$request)
    {
        if ($request->has("start_date")) {
            if ($request->start_date != null) {

                    $query->where('created_at', '>=', $request->start_date);
                }

        }
        return $query;
    }
    public function scopeEndDate($query,$request)
    {
        if ($request->has("end_date")) {
            if ($request->end_date != null) {

                $query->where('created_at', '<=', $request->end_date);
            }

        }
        return $query;
    }



    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }


    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
