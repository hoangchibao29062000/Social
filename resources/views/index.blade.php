<!-- Giao diện chính -->
@extends('myTemplate')
    @section('content')
    <!-- Đăng bài viết -->
    <div class="card mt-4 ml-5" style="width:62rem">
      <div class="row m-2">
        <div class="col-1">
        <button class="btn btn-light " style="border-radius: 360px;"><img src="images/user.png" width="30" height="30" alt="" srcset=""></button>
        </div>
        <div class="col-11">
          <button type="button "class="btn btn-light text-left form-control" data-toggle="modal" data-target="#exampleModal" style="border-radius: 360px;">Hôm nay bạn thế nào? </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tạo Bài Viết</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Body Modal -->
                    <form action="/post" method="post" enctype="multipart/form">
                        @csrf
                        <div class="modal-body">
                            <div class="row mb-2">
                                <!-- Avatar người tạo bài -->
                                <div class="col-1 pt-2">
                                    <img src="images/user.png" height="30" width="30"alt="" srcset="">
                                </div>
                                <div class="col-10 text-left">
                                    <div class="row">
                                        <!-- Tên người tạo bài -->
                                        <div class="col-12">
                                            {{$_SESSION['login']['name']}}
                                        </div>
                                        <!-- Chọn chế độ của bài viết -->
                                        <div class="col-12">
                                        <select name="role">
                                            <option value="0">Chỉ mình tôi</option>
                                            <option value="1">Cộng đồng</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <textarea name="content" placeholder="Hôm nay bạn thế nào" cols="60" rows="10"></textarea>
                            <p>Chọn ảnh</p>
                            <input type="file" name="image"> 
                        </div>
                        <!-- Nút Submit -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary form-control">Đăng Bài Viết</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <hr width="100%">
      </div>
  </div>
  <!-- NƠI XUẤT BÀI VIẾT -->
  @foreach ($posts as $post)
  <div class="card mt-4 ml-5" style="width:62rem">
    <div class="card-body">
        <!-- Tài khoản đăng -->
        <div class="row">
            <div class="col-1">
                <a href="#" class="rounded-circle"><img src="images/{{$post->user->avatar }}" class="rounded-circle p-0 m-0" width="50px" height="50" alt="" srcset=""></a>
            </div>
            <div class="col-9 text-left">
                <p class="h5"> {{$post->user->name }}</p>
                <p class="text-secondary">mới đây. <img src="images/friends.png" width="20" height="20" alt="" srcset=""></p>
            </div>
            <div class="col-2 text-right">
                <button class="btn btn-light " style="border-radius: 360px;"><img src="images/dots.png" width="20" height="20" alt="" srcset=""></button>
            </div>
        </div>
        <!-- Nội dung bài viết -->
        <div>
            <p>{{ $post->content }}</p>
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

@endforeach
    @endsection

