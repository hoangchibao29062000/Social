<?php

namespace App\Http\Controllers;

use App\Models\Share;
use Illuminate\Http\Request;

class ShareController extends Controller
{
    public function share(Request $request){
        Share::create([
            'post_id_share'=>$_GET['id'],
            'user_id_share'=>$_SESSION['login']->user_id,
        ]);
        return redirect('/');
    }
}
