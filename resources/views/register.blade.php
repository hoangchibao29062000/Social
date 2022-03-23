@extends('myTemplate')
    @section('register')
<div class="container">
        <div class="form">
            <div class="card" style="width: 20rem;">
               <form action="/registered" method="post">
                    @csrf
                   <!-- Họ tên -->
                   <div class="m-3">
                    <input type="text" class="form-control" name="name" placeholder="Nhập Họ tên"/>
                   </div>
                   <!-- Email -->
                   <div class="m-3">
                    <input type="email" class="form-control" name="email" placeholder="Nhập email"/>
                   </div>
                    <!-- Phone -->
                    <div class="m-3">
                    <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại"/>
                   </div>
                   <!-- Mật Khẩu -->
                   <div class="m-3">
                    <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu"/>
                   </div>
                   <!-- Địa chỉ -->
                   <div class="m-3">
                    <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ"/>
                   </div>
                   <!-- Giới Tính -->
                   <div class="m-3">
                       <label>Giới Tính: </label>
                    <input type="radio" name="gender" value="Nam">Nam
                    <input type="radio" name="gender" value="Nữ">Nữ
                    <input type="radio" name="gender" value="Khác">Khác
                   </div>
                   <!-- Nút Đăng ký -->
                   <button type="submit" class="btn btn-success form-control mb-3" >Đăng ký</button>
               </form>
            </div>
        </div>
    </div>
    @endsection