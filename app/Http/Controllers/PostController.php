<?php

namespace App\Http\Controllers;

// session_start();
use App\Models\posts;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    public function index()
    {
        // get posts order by created_at desc
        $posts = posts::orderBy('created_at', 'desc')->get();
        // Xét trường hợp đã login hay chưa
            if(!isset($_SESSION['login'])) {
                return redirect('/login');
            } else {
                return view('index',compact('posts'),['title' => 'Trang Chủ']);
            }
        // return view('index',['title' => 'Trang Chủ']);
        // return view('login',['title' => 'Đăng nhập']);
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
        $dateNow = new DateTime();
        posts::create([
            'content' => $request->content,
            'image' => $request->image,
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
        // $id = $_GET['id'];
        // $post = posts::find($id);
        // $post->delete();
        // return redirect('/myPost');
    }
    public function delete()
    {
        posts::where([
            'post_id'=>$_GET['id'],
            'user_id'=>$_SESSION['login']->user_id,
        ])->delete();
        return redirect('/myPost');
    }
    // Phương thức điều hướng tới tab Bài Viết Của Tôi
    public function myPost() {
        $id = $_SESSION['login']->user_id;
        // get posts by id order by created_at desc
        $posts = posts::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        return view('myPost', compact('posts'), ['title' => 'Bài Viết Của Tôi']);
    }
}
