<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

   // Lấy những thông tin cần
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'gender'
    ];

    // Loại bỏ những thông tin không cần  
    protected $hidden = [
        'remember_token',
    ];
    // Chuyển sang dữ liệu khác
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
