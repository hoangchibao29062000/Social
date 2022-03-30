@extends('myTemplate')
    @section('login')
    <div class="container">
        <div class="form">
            <div class="card" style="width: 20rem;">
               <form action="/login/checkLogin" method="post">
                    @csrf
                   <!-- Tên Đăng Nhập -->
                   <div class="m-3">
                    <input type="email" class="form-control" name="email" placeholder="Nhập email hoặc số điện thoại"/>
                   </div>
                   <!-- Mật Khẩu -->
                   <div class="m-3">
                    
                    <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu"/>
                   </div>
                   <!-- Nút Đăng Nhập -->
                   <div class="m-3 text-center">
                    <button type="submit" class="btn btn-primary form-control mb-3" >Đăng nhập</button>
                    <!-- <a href="">Quên mật khẩu</a> -->
                   </div>
               </form>
               <hr width="60%">
                   <!-- Nút Đăng Ký -->
                   <div class="m-3 text-center">
                    <a href="/register"><button class="btn btn-success w-50 form-control mb-3">Tạo Tài Khoản</button></a>
                   </div>
            </div>
        </div>
    </div>
    @endsection
    
