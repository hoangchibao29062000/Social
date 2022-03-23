<?php

namespace App\Http\Controllers;

use App\Models\User;
session_start();
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    //Xử lý đăng ký
    public function store(Request $request)
    {
        User::create([
            'password' => md5($request->password),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender
        ]);
        return redirect('/login');
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
    // Phương thức xử lý đăng nhật
    public function checkLogin(Request $request)
    {
        $e = 0;
        $user = User::get(); // lấy all user
        foreach ($user as $key => $value) {
            if($request->all()['email'] === $value['email']){ // kiểm tra email 
                $e++;
                if(md5($request->all()['password']) == $value['password']){ // kiểm tra mật khẩu
                    $_SESSION['login'] = $value;
                    return redirect('/');
                } else {
                    echo '<script type="text/javascript"> alert("Mật khẩu không đúng.")</script>' ;
                    return redirect('/');
                }
            }
        }
        if($e == 0){
            echo '<script type="text/javascript"> alert("Email không tồn tại")</script>' ;
            return redirect('/');
        }
    }

    public function checkLogout(){
        session_destroy(); // xoá session
        return redirect('/login');
    }
}
