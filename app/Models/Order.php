<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static find($ordersID)
 */
class Order extends Model
{
    use HasFactory,SoftDeletes;

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }

}
