<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function order(){
        return $this->belongsTo(Order::class, "order_id", "id");
    }

    public function product(){
        return $this->belongsTo(Order::class, "product_id", "id");
    }
}
