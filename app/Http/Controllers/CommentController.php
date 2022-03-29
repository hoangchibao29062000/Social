<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comments;
use DateTime;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->image != null) {
            // Xử lý hình ảnh
            // Đường dẫn lưu hình
            $target_dir= "images/myComment";
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
            // Xử lý đưa lên Database
            comments::create([
                'post_id'=>$_GET['id'],
                'user_id'=>$_SESSION['login']->user_id,
                'content'=>$request->content,
                'image'=>$image,
                'date_cmt' =>$dateNow,
            ]); 
            return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

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
    public function destroy($id)
    {
        //
    }
}
