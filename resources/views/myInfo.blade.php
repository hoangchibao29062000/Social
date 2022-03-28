@extends('myTemplate')

@section('myInfo')
   <div class="row mt-3">
       <div class="col-7">
        <div class="row">
            <!-- Avatar -->
            <div class="col-2">
            @if($_SESSION['login']->avatar == null)
                <img src="/images/user.png" alt="" srcset="" width="120" height="120" class="rounded-circle">
            @else
                <img src="/images/avatar/<?php echo ($_SESSION['login']->avatar);  ?>" class="rounded-circle" alt="" srcset="" width="120" height="120">
            @endif
            </div>
            <div class="col-10">
                <div class="row">
                    <!-- Tên Người Dùng -->
                    <div class="col-6">
                        <h4>{{$_SESSION['login']->name}}</h4>
                    </div>
                    <!-- Chỉnh Sửa Thông Tin -->
                    <div class="col-6">
                        <button class="btn btn-primary text-right" data-toggle="modal" data-target="#editInfoModal">Chỉnh Sửa Thông Tin</button>
                        <!-- Modal -->
                        <div class="modal fade" id="editInfoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh Sửa Thông Tin</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <!-- Body Modal -->
                                <form action="/editUser" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <label style="font-size:20px; font-weight:bold">Avatar</label> <br>
                                        <input type="file" name="avatar"/> <br>
                                        <label style="font-size:20px; font-weight:bold">Tên Cá Nhân</label> <br>
                                        <input type="text" name="name" class="form-control" value="{{$_SESSION['login']->name}}"/>
                                        <label style="font-size:20px; font-weight:bold">Email</label> <br>
                                        <input type="email" name="email" class="form-control" value="{{$_SESSION['login']->email}}"/>
                                        <label style="font-size:20px; font-weight:bold">Số Điện Thoại</label> <br>
                                        <input type="text" name="phone" class="form-control" value="{{$_SESSION['login']->phone}}"/>
                                        <label style="font-size:20px; font-weight:bold">Địa chỉ</label> <br>
                                        <input type="text" name="address" class="form-control" value="{{$_SESSION['login']->address}}"/>
                                    
                                    </div>
                                    <!-- Nút Submit -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary form-control">Đồng Ý</button>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                    <!-- Số bạn bè -->
                    <div class="col-6">
                        20 Bạn Bè
                    </div>
                </div>
            </div>
        </div>
        <!-- Thông Tin Cá Nhân -->
            <h3>Giới Thiệu</h3>
            <p style="font-size:20px">
                <img src="images/myInfo/arroba.png" width="40" height="40" alt="" srcset="">
                {{$_SESSION['login']->email}}
            </p>
            <p style="font-size:20px">
                <img src="images/myInfo/home-page.png" width="40" height="40" alt="" srcset="">
                {{$_SESSION['login']->address}}
            </p>
            <p style="font-size:20px">
                <img src="images/myInfo/phone-call.png" width="40" height="40" alt="" srcset="">
                {{$_SESSION['login']->phone}}
            </p>
            <p style="font-size:20px">
                @if ($_SESSION['login']->gender== 'Nam' || $_SESSION['login']->gender== 'nam')
                    <img src="images/myInfo/mars.png" width="40" height="40" alt="" srcset="">
                    {{$_SESSION['login']->gender}}
                @else
                    <img src="images/myInfo/femenine.png" width="40" height="40" alt="" srcset="">
                    {{$_SESSION['login']->gender}}
                @endif
            </p>
        </div>
        <div class="col-4">
            <h3>Danh Sách Bạn Bè</h3>
            <div class="row">
                <div class="col-5 mr-4 mb-2 card">
                    <img src="images/user.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Chí Bảo</h5>
                    </div>
                </div>
                <div class="col-5 mr-4 mb-2 card">
                    <img src="images/user.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Chí Bảo</h5>
                    </div>
                </div>
                <div class="col-5 mr-4 mb-2 card">
                    <img src="images/user.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Chí Bảo</h5>
                    </div>
                </div>
            </div>
        </div>
   </div>
    
@endsection
