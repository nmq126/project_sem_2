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

    public static function search()
    {
        if (request('key')) {
            $key = request('key');
            $query = DB::table('orders')->where('id','=', '%' . $key . '%')
                ->orWhere('ship_name','like', '%' . $key . '%')
                ->orWhere('ship_phone','like', '%' . $key . '%')
                ->orWhere('ship_address','like', '%' . $key . '%')
                ->orWhere('total_price','like', '%' . $key . '%');
        }

        return $query;
    }


    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
