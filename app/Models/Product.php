<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;



    public function scopeStatus($query, $request)
    {
        if ($request->has("status")) {
            if ($request->status != null && $request->status != -1) {
                    $query->where('status', '=', $request->status);
                }
            }

        return $query;
    }
    public function scopeDiscount($query,$request)
    {
        if ($request->has("discount")) {
            if ($request->discount != null && $request->discount != -1) {

                $query->where('discount', '>=', $request->discount)->where('discount','<', $request->discount + 10);
            }
        }

        return $query;
    }
    public function scopeIsFeatured($query,$request)
    {
        if ($request->has("isFeatured")) {
            if ($request->isFeatured != null && $request->isFeatured != -1) {

                $query->where('isFeatured', '=', $request->isFeatured);
            }
        }

        return $query;
    }
    public function scopeCategoryId($query,$request)
    {
        if ($request->has("category")) {
            if ($request->category != null && $request->category != -1) {

                $query->where('category_id', '=', $request->category);
            }
        }

        return $query;
    }
    public function scopeName($query,$request)
    {
        if ($request->has("name")) {
            if ($request->name != null) {

                $query->where('name', 'like', '%' . $request->name . '%');
            }
        }

        return $query;
    }
    public function scopeMinprice($query,$request)
    {
        if ($request->has("min")) {
            if ($request->min != null) {

                $query->where('price', '>=', $request->min);
            }
        }

        return $query;
    }
    public function scopeMaxprice($query,$request)
    {
        if ($request->has("max")) {
            if ($request->max != null) {

                $query->where('price', '<', $request->max);
            }
        }

        return $query;
    }
    public function category(){
        return $this->belongsTo(Category::class, "category_id", "id");

    }

    public function ingredient(){
        return $this->belongsTo(Ingredient::class, "ingredient_id", "id");
    }

    public function orderDetails(){
        return $this->hasMany(Ingredient::class, "ingredient_id", "id");
    }
    public function getImageAttribute()
    {

        if ($this->thumbnail != null) {
            $thumbnail = $this->thumbnail;
            $arrayImage = explode(",",$thumbnail);
        }
        return   $arrayImage;
    }
    public function getFirstAttribute()
    {

        if ($this->thumbnail != null) {
            $thumbnail = $this->thumbnail;
            $arrayImage = explode(",",$thumbnail);
        }
        return   $arrayImage[0];
    }
}
