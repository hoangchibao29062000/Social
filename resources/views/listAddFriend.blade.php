@extends('myTemplate')
@section('listAddFriend')
<div class="row mt-2">
    <!-- 1 Obj -->
    <div class="col-6">
        <!-- Avatar -->
        <div class="col-2">
            <button class="btn btn-light" style="border-radius: 360px;"><img src="images/user.png" width="40" height="40" alt="" srcset=""></button>
        </div>
        <div class="col-10">
            <div class="row">
                <!-- Tên Người Dùng -->
                <div class="col-8">
                    <p>Phương Anh</p>
                </div>
                <!-- Trạng trái -->
                <div class="col-4 text-right">
                    <p>Mới đây</p>
                </div>
                <!-- Các Nút  -->
                <div class="col-6">
                    <button class="btn btn-primary form-control">Xác Nhận</button>
                </div>
                <div class="col-6">
                    <button class="btn btn-secondary form-control">Xóa</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection