<?php

namespace App\Http\Controllers;

use App\Models\User;
session_start();
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::get();
        return view('login',['title' => 'Đăng nhập']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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

    public function checkLogin(Request $request)
    {
        $e = 0;
        $user = User::get();
        foreach ($user as $key => $value) {
            if($request->all()['email'] === $value['email']){ // kiểm tra email 
                if(md5($request->all()['password']) == $value['password']){ // kiểm tra mật khẩu
                    $e++; // cấm cờ
                    $_SESSION['login'] = $request->all();
                    return redirect('/');
                }
            }
        }
        if($e == 0){
            echo '<script type="text/javascript"> alert("Email không tồn tại")</script>' ;
        }
    }

    public function checkLogout(){
        session_destroy();
        return redirect('/login');
    }
}
