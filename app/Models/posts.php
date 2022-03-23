<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class posts extends Model
{
    use HasFactory;
    // Lấy những thuộc tính cần
    protected $fillable = [
        'post_id',
        'content',
        'role',
        'image',
        'user_id'
    ];
    // Lấy thông tin người đăng
    public function user(){
        return $this->hasOne('App\Models\User' ,'user_id','user_id');
    }
}
