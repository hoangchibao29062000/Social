@extends('myTemplate')
@section('ranking')
<div class="mt-2">
    <h3 class="text-center">BẢNG XẾP HẠNG CÁC BÀI VIẾT ĐƯỢC YÊU THÍCH</h3>
    <div class="card">
       <div class="row">
           <!-- Avatar và tên người đăng bài -->
        <div class="col-2">
            <p>
                <img src="images/user.png" width="40" height="40"alt="" srcset="">
                Dương An
            </p>
        </div>
        <!-- Nội dung -->
        <div class="col-6">
            <p class="mt-2">Nội Dung Bài Viết</p>
        </div>
        <!-- Số like, bình luận -->
        <div class="col-4 text-right">
            <p>
                <label class="border-right p-2">Số Like: 100</label>
                <label>Số Binh Luận: 10</label>
                <a href="/detailPost" class=""><button class="btn btn-success">Xem chi tiết</button></a>
            </p>
        </div>
       </div>
    </div>
</div>
@endsection