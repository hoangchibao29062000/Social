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
    // Lấy thông tin người thích bài viết
    public function getUserLike(){
        return $this->hasOne('App\Models\User' ,'user_id','user_id');
    }

    // môt một phụ sang chính
    public function post()
    {
        return $this->belongsTo(posts::class, 'post_id', 'post_id');
    }
    // môt một phụ sang chính

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}


