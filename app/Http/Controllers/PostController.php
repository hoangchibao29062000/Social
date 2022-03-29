<?php

namespace App\Http\Controllers;

// session_start();

use App\Models\comments;
use App\Models\Friends;
use App\Models\posts;
use App\Models\likes;
use App\Models\Share;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    public function index()
    {
        $posts = posts::orderBy('created_at', 'desc')->get();
        $likes = likes::get();
        $comments = comments::orderBy('created_at', 'desc')->get();
        $shares = Share::orderBy('created_at', 'desc')->get();
        $friends = Friends::orderBy('created_at', 'desc')->get();
        // Xét trường hợp đã login hay chưa
        if(!isset($_SESSION['login'])) {
            return redirect('/login');
        } else {
            return view('index',compact('posts','likes','comments','shares','friends'),['title' => 'Trang Chủ']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upPost(Request $request)
    {
        if($request->image != null) {
        // Xử lý hình ảnh
            // Đường dẫn lưu hình
            $target_dir= "images/myPost";
            // File hình
            $image =  date("d-m-Y H:i:s",time()).'_'.$request->image->getClientOriginalName();
            // Tạo đường tới folder lưu hình
            $destinationPath =public_path($target_dir);
            // Dẫn file tới folder
            $request->image->move($destinationPath,$image);
        }else{
            $image = null;
        }
        $dateNow = new DateTime();
        posts::create([
            'content' => $request->content,
            'image' => $image,
            'role' => $request->role,
            'user_id' => $_SESSION['login']->user_id,
            'date' => $dateNow
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //

    // }
    // public function show()
    // {
    //     $posts = posts::get();
    //     return view('index',compact('posts'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //delete post
        $post_id = $_GET['id'];
        Share::where('post_id_share',$post_id)->delete();
        likes::where('post_id',$post_id)->delete();
        comments::where('post_id',$post_id)->delete();
        posts::where([
            'post_id'=>$_GET['id'],
            'user_id'=>$_SESSION['login']->user_id,
        ])->delete();
        return redirect('/');
    }
    // Phương thức điều hướng tới tab Bài Viết Của Tôi
    public function myPost() {
        $id = $_SESSION['login']->user_id;
        // get posts by id order by created_at desc
        $posts = posts::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        $likes = likes::get();
        $comments =comments::get();
        return view('myPost', compact('posts','likes','comments'), ['title' => 'Bài Viết Của Tôi']);
    }

    public function rankPost()
    {
        // $likes = DB::table('likes')
        //      ->select(DB::raw('count(post_id),post_id'))
        //      ->groupby('post_id')
        //      ->get();
        $likes = likes::select(DB::raw('count(post_id) as count, post_id'))
            ->groupBy('post_id')
            ->orderBy('count', 'desc')
            ->get();

        $posts = posts::get();
        $comments = comments::orderBy('created_at', 'desc')->get();
        $shares = Share::orderBy('created_at', 'desc')->get();
        $friends = Friends::orderBy('created_at', 'desc')->get();
        // dd($likes);
        return view('ranking',compact('posts','likes','comments','shares','friends'),['title' => 'Xếp hạng bài viết']);
    }


}
