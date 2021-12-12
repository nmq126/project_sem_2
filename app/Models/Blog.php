<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;

    public function scopeSearch($query)
    {
        if (request('key')) {
            $key = request('key');
            $query = $query->where("title", "like", '%' . $key . '%');
        }

        return $query;
    }

    public function getDetailAttribute()
    {

        if ($this->details != null && strlen($this->details) > 0) {
            $array_detail = explode(';', $this->details);


            return $array_detail;
        }
    }
    public function getThumbnailAttribute()
    {

        if ($this->image != null && strlen($this->image) > 0) {
            $array_image = explode(',', $this->image);


            return $array_image[0];
        }
    }
}
