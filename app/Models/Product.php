<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    public function category(){
        return $this->belongsTo(Category::class, "category_id", "id");

    }

    public function ingredient(){
        return $this->belongsTo(Ingredient::class, "ingredient_id", "id");
    }

    public function orderDetails(){
        return $this->hasMany(Ingredient::class, "ingredient_id", "id");
    }

}
