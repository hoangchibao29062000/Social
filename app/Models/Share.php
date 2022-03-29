<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id_share',
        'user_id_share',
    ];

    // môt một phụ sang chính
    public function post()
    {
        return $this->belongsTo(posts::class, 'post_id_share', 'post_id');
    }
    // môt một phụ sang chính

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id_share', 'user_id');
    }

}
