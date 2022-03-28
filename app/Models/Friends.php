<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    use HasFactory;
    protected $fillable = [
        'role',
        'user_id_send',
        'user_id_get'
    ];
     // Lấy thông tin người gửi lời kết bạn
     public function getUserSend(){
        return $this->hasOne('App\Models\User' ,'user_id','user_id_send');
    }
    // Lấy thông tin người nhận lời kết bạn
    public function getUserGet(){
        return $this->hasOne('App\Models\User' ,'user_id','user_id_get');
    }
    
}
