<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'content',
        'role',
        'user_id'
    ];
    // public function user(){
    //     return $this->belongsTo(User::class,'user_id');
    // }
}
