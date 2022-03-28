<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use App\Models\User;
use Illuminate\Contracts\Session\Session as Session;

// session_start();
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
        $d = 0;
        $user = User::get(); // lấy all user
        foreach ($user as $key => $value) {
            if($request->all()['email'] === $value['email']){ // kiểm tra email 
                $d++;
            }
        }
        if($d == 0){
            User::create([
                'password' => md5($request->password),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'gender' => $request->gender
            ]);
            return redirect('/login');
        } else {
            return redirect('/register');
            echo '<script type="text/javascript"> alert("Email đã tồn tại")</script>' ;
        }
        
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
                } 
                // if(Hash::check('password',$request->password) == $value['password']){ // kiểm tra mật khẩu
                //     $_SESSION['login'] = $value;
                //     Session::put('user',$value); // set
                //     Session::get('user');
                //     return redirect('/');
                // }
                else {
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
    // Đăng Xuất
    public function checkLogout(){
        session_destroy(); // xoá session
        return redirect('/login');
    }

    public function getAllUser()
    {
        $friends = Friends::get();
        $user = User::get();
        return view('myFriend',compact('user','friends'),['title' => 'Bạn Bè']);
    }
    // Chỉnh sửa thông tin người Dùng
    public function editUser(Request $request) {
        if($request->avatar != null) {
         // Xử lý hình ảnh
            // Đường dẫn lưu hình
            $target_dir= "images/avatar";
            // File hình
            $avatar =  time().'_'.$request->avatar->getClientOriginalName();
            // Tạo đường tới folder lưu hình
            $destinationPath =public_path($target_dir);
            // Dẫn file tới folder
            $request->avatar->move($destinationPath,$avatar);
        }else{
            $avatar=null;
        }
        $update_user = [
            'avatar' =>$avatar,
            'name' =>$request->name,
            'email' =>$request->email,
            'phone' =>$request->phone,
            'address' =>$request->address,
        ];
        user::where('user_id', $_SESSION['login']->user_id)->update($update_user);
        $_SESSION['login']->name = $update_user['name'];
        $_SESSION['login']->avatar = $update_user['avatar'];
        $_SESSION['login']->email = $update_user['email'];
        $_SESSION['login']->phone = $update_user['phone'];
        $_SESSION['login']->address = $update_user['address'];
        return redirect('/myInfo');
    }
}
