<!-- Giao diện chính -->
@extends('myTemplate')
    @section('content')
    <?php
    var_dump($_SESSION['login']);
    ?>
  <div class="card mt-4 ml-5" style="width:62rem">
    <div class="card-body">
      <!-- Tài khoản đăng -->
      <div class="row">
        <div class="col-1">
          <button class="btn btn-light" style="border-radius: 360px;"><img src="images/user.png" width="30" height="30" alt="" srcset=""></button>
        </div>
        <div class="col-9 text-left">
          <p class="h5">Dương An</p>
          <p class="text-secondary">mới đây. <img src="images/friends.png" width="20" height="20" alt="" srcset=""></p>
        </div>
        <div class="col-2 text-right">
          <button class="btn btn-light " style="border-radius: 360px;"><img src="images/dots.png" width="20" height="20" alt="" srcset=""></button>
        </div>
      </div>
      <!-- Nội dung bài viết -->
      <div>
        <p>Nắng hoàng hôn ai nung mà đỏ
            Thương ai rồi có bỏ được đâu 😶
            🗨️:Chờ đợi có đáng sợ</p>
      </div>
    </div>
  <!-- Hình của bài viết -->
    <img src="images/post-1.jpg" height="500">
    <hr class="text-center">
    <!-- Lượt thích -->
    <div class="row ml-3 mr-3">
      <div class="col-10">
        <p>
          <img src="images/like.png" width="20" height="20" alt="" srcset="">
          100
      </p>
      </div>
      <div class="col-2 text-right">
        <p>n bình luận</p>
      </div>
    </div>
    <!-- Nút Like, Bình Luận, Chia Sẻ -->
    <div class="text-center p-auto m-auto" style="border-top:1px solid; width:70%" >
      <div class="row">
        <div class="col-4 ">
            <button class="btn btn-light">
            <img src="images/like-white.png" width="25" height="25" alt="" srcset="">
            Thích
            </button>
        </div>
        <div class="col-4">
            <button class="btn btn-light">
            <img src="images/message.png" width="25" height="25" alt="" srcset="">
            Bình Luận
            </button>
        </div>
        <div class="col-3">
            <button class="btn btn-light">
            <img src="images/share.png" width="25" height="25" alt="" srcset="">
            Chia Sẻ
            </button>
        </div>
      </div>
    </div>
  </div>

  <div class="card mt-4 ml-5" style="width:62rem">
    <div class="card-body">
      <!-- Tài khoản đăng -->
      <div class="row">
        <div class="col-1">
          <button class="btn btn-light" style="border-radius: 360px;"><img src="images/user.png" width="30" height="30" alt="" srcset=""></button>
        </div>
        <div class="col-9 text-left">
          <p class="h5">Dương An</p>
          <p class="text-secondary">mới đây. <img src="images/friends.png" width="20" height="20" alt="" srcset=""></p>
        </div>
        <div class="col-2 text-right">
          <button class="btn btn-light " style="border-radius: 360px;"><img src="images/dots.png" width="20" height="20" alt="" srcset=""></button>
        </div>
      </div>
      <!-- Nội dung bài viết -->
      <div>
        <p>Nắng hoàng hôn ai nung mà đỏ
            Thương ai rồi có bỏ được đâu 😶
            🗨️:Chờ đợi có đáng sợ</p>
      </div>
    </div>
  <!-- Hình của bài viết -->
    <img src="images/post-1.jpg" height="500">
    <hr class="text-center">
    <!-- Lượt thích -->
    <div class="row ml-3 mr-3">
      <div class="col-10">
        <p>
          <img src="images/like.png" width="20" height="20" alt="" srcset="">
          100
      </p>
      </div>
      <div class="col-2 text-right">
        <p>n bình luận</p>
      </div>
    </div>
    <!-- Nút Like, Bình Luận, Chia Sẻ -->
    <div class="text-center p-auto m-auto" style="border-top:1px solid; width:70%" >
      <div class="row">
        <div class="col-4 ">
            <button class="btn btn-light">
            <img src="images/like-white.png" width="25" height="25" alt="" srcset="">
            Thích
            </button>
        </div>
        <div class="col-4">
            <button class="btn btn-light">
            <img src="images/message.png" width="25" height="25" alt="" srcset="">
            Bình Luận
            </button>
        </div>
        <div class="col-3">
            <button class="btn btn-light">
            <img src="images/share.png" width="25" height="25" alt="" srcset="">
            Chia Sẻ
            </button>
        </div>
      </div>
    </div>
  </div>
    @endsection
    
