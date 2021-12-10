<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Builder;

class OrderDetail extends Model
{
    use HasFactory;

    protected $primaryKey = ['order_id', 'product_id'];
    public $incrementing = false;

    /**
     * Set the keys for a save update query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     * đoạn này override method của nó vì dùng composite primary key dẫn đến lỗi illegal offset type
     * bỏ cai primary key bên trên chạy dc nhưng deploy lên nó méo chạy được do không nhận ra trường primary key
     */
    protected function setKeysForSaveQuery($query) {
        $keys = $this-> getKeyName();
   if (!is_array($keys)) {
       return parent::setKeysForSaveQuery($query);
   }

   foreach($keys as $keyName) {
       $query-> where($keyName, '=', $this-> getKeyForSaveQuery($keyName));
   }

   return $query;
}

    /**
     * Get the primary key value for a save query.
     *
     * @param mixed $keyName
     * @return mixed
     */
    protected function getKeyForSaveQuery($keyName = null) {
        if (is_null($keyName)) {
            $keyName = $this->getKeyName();
   }

        if (isset($this->original[$keyName])) {
            return $this->original[$keyName];
   }

   return $this->getAttribute($keyName);
}

    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, "product_id", "id");
    }

}
