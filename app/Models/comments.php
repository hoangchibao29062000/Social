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
    // môt một phụ sang chính
    public function post()
    {
        return $this->belongsTo(posts::class, 'post_id', 'post_id');
    }
    //  Lấy thông tin người bình luận

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    // Lấy thông tin người thích bài viết
    public function getUserComment(){
        return $this->hasOne('App\Models\User' ,'user_id','user_id');
    }
    
}
