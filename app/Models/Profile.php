<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory;
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    public function user(){
        $this->belongsTo(User::class, 'user_id', 'id');
    }
}
