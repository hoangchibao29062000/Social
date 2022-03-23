<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class posts extends Model
{
    use HasFactory;
    protected $fillable = [
        'post_id',
        'content',
        'role',
        'user_id'
    ];
    public function user(){
        return $this->hasOne('App\Models\User' ,'user_id','user_id');
    }
}
