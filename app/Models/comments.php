<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'user_id',
        'image',
        'content',
        'date_cmt'
    ];
    // Lấy thông tin người đăng
    public function user(){
        return $this->hasOne('App\Models\User' ,'user_id','user_id');
    }
}
