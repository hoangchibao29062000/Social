<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likes extends Model
{
    use HasFactory;// Lấy những thông tin cần
    protected $fillable = [
        'post_id',
        'user_id',
    ];
}
