@extends('myTemplate')
@section('myPost')

@if($_SESSION['login']->user_id !== null)
  <img src="images/user.png" alt="" srcset="" width="40" height="40" class="rounded-circle">

  @foreach ($posts as $post)


<div class="card mt-4 ml-5" style="width:70rem">
    <div class="card-body">
      <!-- Tài khoản đăng -->
      <div class="row">
        <div class="col-1">
          <button class="btn btn-light" style="border-radius: 360px;"><img src="images/user.png" width="30" height="30" alt="" srcset=""></button>
        </div>
        <div class="col-9 text-left">
          <p class="h5">{{ $post->name }}</p>
          <p class="text-secondary">{{ $post->created_at->format('d/m_____H:i') }} <img src="images/friends.png" width="20" height="20" alt="" srcset=""></p>
        </div>
        <div class="col-2 text-right">
          <button class="btn btn-light rounded-circle dropdown-friend">
            <img src="images/dots.png" width="20" height="20" alt="" srcset="">
                <div class="dropdown-content-friend">
                  <a class="btn btn-info">Chỉnh Sửa</a>
                    <a class="btn btn-danger" href="/deletePost?id={{ $post->post_id }}">Xóa</a>

                </div>
            </button>
        </div>
      </div>
      <!-- Nội dung bài viết -->
      <div>
        <p>{{ $post->content }}</p>
      </div>
    </div>
  <!-- Hình của bài viết -->
    <img src="images/myPost/{{ $post->image }}" height="500">
    <hr class="text-center">
    <!-- Lượt thích -->
    <div class="row ml-3 mr-3">
        @if($post->likes->count() > 0 )
      <div class="col-10">
        <p>
          <img src="images/like.png" width="20" height="20" alt="" srcset="">
            <span>{{ $post->likes->count() }}</span>
      </p>
      </div>
        @endif
        @if($post->likes->count() > 0 )
      <div class="col-2 text-right">
        <p>{{ $post->comments->count() }} bình luận</p>
      </div>
        @endif
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
@endif

@endsection
