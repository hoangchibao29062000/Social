<?php

namespace App\Http\Controllers;
use App\Models\comments;
use App\Models\Friends;
use App\Models\posts;
use App\Models\likes;
use App\Models\Share;
use App\Models\User;
use Illuminate\Http\Request;

class MyActivityController extends Controller
{
    public function index() {
        $dataLikes = likes::get();
        $dataPost = posts::get();
        $dataComments = comments::get();
        // Lấy các post của mình và trong ngày hiện tại
        $posts = array();
        foreach (posts::orderBy('created_at', 'desc')->get() as $post) {
             if($post->user_id == $_SESSION['login']->user_id && $post->created_at->format('d') == date("d",time())) {
                 $posts[] = $post;
             }
        }

        // Lấy các share của mình và trong ngày hiện tại
        $shares = array();
        foreach (Share::orderBy('created_at', 'desc')->get() as $share) {
             if($share->user_id == $_SESSION['login']->user_id && $share->created_at->format('d') == date("d",time())) {
                 $shares[] = $share;
             }
        }

        // Lấy các like của mình và trong ngày hiện tại
        $likes = array();
        foreach (likes::orderBy('created_at', 'desc')->get() as $like) {
            if($like->user_id == $_SESSION['login']->user_id && $like->created_at->format('d') == date("d",time())) {
                $likes[] = $like;
            }
        }

        // Lấy các commnent của mình và trong ngày hiện tại
        $comments = array();
        foreach (comments::orderBy('created_at', 'desc')->get() as $comment) {
            if($comment->user_id == $_SESSION['login']->user_id && $comment->created_at->format('d') == date("d",time())) {
                $comments[] = $comment;
            }
        }
        // Lấy các thay đổi thông tin của mình và trong ngày hiện tại
        $changeUsers = array();
        foreach (User::orderBy('created_at', 'desc')->get() as $u) {
            if($u->user_id == $_SESSION['login']->user_id && $u->created_at->format('d') == date("d",time())) {
                $changeUsers[] = $u;
            }
        }
        // Lấy các thay đổi kết bạn của mình và trong ngày hiện tại
        $changeFriends = array();
        foreach (Friends::orderBy('created_at', 'desc')->get() as $f) {
            if(($f->user_id_send == $_SESSION['login']->user_id || $f->user_id_get == $_SESSION['login']->user_id) && $f->created_at->format('d') == date("d",time())) {
                $changeFriends[] = $f;
            }
        }
        return view('/MyActivity',compact('posts','likes','comments','shares','changeUsers','changeFriends','dataLikes','dataPost','dataComments'),['title' => 'Nhật Kí Hoạt Động']);
    }
}
