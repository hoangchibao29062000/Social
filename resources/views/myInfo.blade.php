@extends('myTemplate')

@section('myInfo')
    <div class="row m-4">
        <!-- Avatar -->
        <div class="col-1">
        @if($_SESSION['login']->avatar == null)
            <img src="/images/user.png" alt="" srcset="" width="120" height="120" class="rounded-circle">
        @else
            <img src="/images/<?php echo ($_SESSION['login']->avatar);  ?>" class="rounded-circle" alt="" srcset="" width="120" height="120">
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
                    <button class="btn btn-primary text-right">Chỉnh Sửa Thông Tin</button>
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
@endsection
