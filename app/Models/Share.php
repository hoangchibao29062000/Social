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
     // Lấy thông tin người share
     public function shares(){
        return $this->hasMany(Share::class,'post_id_share', 'post_id');
    }
}
