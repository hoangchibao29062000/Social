<!-- Giao diện chính -->
@extends('myTemplate')
    @section('content')
    <!-- Đăng bài viết -->
    <div class="card mt-4 ml-5" style="width:62rem">
      <div class="row m-2">
        <div class="col-1">
            @if ($_SESSION['login']->avatar == null)
                <a href="myInfo" class="rounded-circle"><img src="images/user.png" class="rounded-circle p-0 m-0" width="50px" height="50" alt="" srcset=""></a>
            @else
                <a href="myInfo" class="rounded-circle"><img src="images/avatar/<?php echo ($_SESSION['login']->avatar);  ?>" class="rounded-circle p-0 m-0" width="50px" height="50" alt="" srcset=""></a>
            @endif
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
                    <form action="/post" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="row mb-2">
                                <!-- Avatar người tạo bài -->
                                <div class="col-2 pt-2">
                                    @if ($_SESSION['login']->avatar == null)
                                        <a href="#" class="rounded-circle"><img src="images/user.png" class="rounded-circle p-0 m-0" width="50px" height="50" alt="" srcset=""></a>
                                    @else
                                        <a href="#" class="rounded-circle"><img src="images/avatar/<?php echo ($_SESSION['login']->avatar);  ?>" class="rounded-circle p-0 m-0" width="50px" height="50" alt="" srcset=""></a>
                                    @endif
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

  {{-- get shares--}}
    @foreach ($shares as $share)
        <div class="card mt-4 ml-5" style="width:62rem">
            <div class="row m-2">
                <div class="col-1">
                    @if ($share->user->avatar == null)
                        <a href="#" class="rounded-circle"><img src="images/user.png" class="rounded-circle p-0 m-0" width="50px" height="50" alt="" srcset=""></a>
                    @else
                        <a href="#" class="rounded-circle"><img src="images/avatar/<?php echo ($share->user->avatar);  ?>" class="rounded-circle p-0 m-0" width="50px" height="50" alt="" srcset=""></a>
                    @endif
                </div>
                <div class="col-11">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                    <div class="col-6">
                                        <label class="h4" href="#" class="text-left">{{ $share->user->name }}</label>
                                        <label>Shared from {{ $share->post->user->name }} at {{ $share->created_at->format('H:i__d/m') }}</label>
                                    </div>
                                    @if($share->user->user_id == $_SESSION['login']->user_id)
                                    <div class="col-5 text-right">
                                        <button class="btn btn-light dropdown-share" style="border-radius: 360px;"><img src="images/dots.png" width="20" height="20" alt="" srcset="">
                                            <div class="dropdown-content-share">
                                                <a class="btn btn-info">Chỉnh Sửa</a>
                                                <a class="btn btn-danger" href="/deleteShare?id={{ $share->id }}">Xóa</a>
                                            </div>
                                        </button>
                                    </div>
                                    @endif
                                <div class="card m-auto d-block" style="width:62rem">
                                    <div class="card-body">
                                        <!-- Tài khoản đăng -->
                                        <div class="row">
                                            <div class="col-1">
                                                @if ($share->post->user->avatar == null)
                                                    <a href="#" class="rounded-circle"><img src="images/user.png" class="rounded-circle p-0 m-0" width="50px" height="50" alt="" srcset=""></a>
                                                @else
                                                    <a href="#" class="rounded-circle"><img src="images/avatar/{{$share->post->user->avatar }}" class="rounded-circle p-0 m-0" width="50px" height="50" alt="" srcset=""></a>
                                                @endif
                                            </div>
                                            <div class="col-9 text-left">
                                                <p class="h5"> {{$share->post->user->name }}</p>
                                                <p class="text-secondary">{{ $share->post->created_at->format('d/m_____H:i') }}<img src="images/friends.png" width="20" height="20" alt="" srcset=""></p>
                                            </div>
                                            <div class="col-2 text-right">

                                            </div>
                                        </div>
                                        <!-- Nội dung bài viết -->
                                        <div>
                                            <p>{{ $share->post->content }}</p>
                                            </div>
                                        </div>
                                            <!-- Hình của bài viết -->
                                            @if ($share->post->image != null)
                                            <img src="images/myPost/{{ $share->post->image }}" height="500">
                                        @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


  <!-- NƠI XUẤT BÀI VIẾT -->

  @foreach ($posts as $post)
  @if($post->role == 1)
  <div class="card mt-4 ml-5" style="width:62rem">
    <div class="card-body">
        <!-- Tài khoản đăng -->
        <div class="row">
            <div class="col-1">
                @if ($post->user->avatar == null)
                    <a href="#" class="rounded-circle"><img src="images/user.png" class="rounded-circle p-0 m-0" width="50px" height="50" alt="" srcset=""></a>
                @else
                    <a href="#" class="rounded-circle"><img src="images/avatar/{{$post->user->avatar }}" class="rounded-circle p-0 m-0" width="50px" height="50" alt="" srcset=""></a>
                @endif
            </div>
            <div class="col-8 text-left">
                <p class="h5"> {{$post->user->name }}</p>
                <p class="text-secondary">{{ $post->created_at->format('d/m_____H:i') }}<img src="images/friends.png" width="20" height="20" alt="" srcset=""></p>
            </div>
            @if($post->user->user_id == $_SESSION['login']->user_id)
            <div class="col-2 text-right">
                <button class="btn btn-light dropdown-friend" style="border-radius: 360px;"><img src="images/dots.png" width="20" height="20" alt="" srcset="">
                    <div class="dropdown-content-friend">
                        <a class="btn btn-info">Chỉnh Sửa</a>
                        <a class="btn btn-danger" href="/deletePost?id={{ $post->post_id }}">Xóa</a>
                    </div>
                </button>
            </div>
            @endif
        </div>
        <!-- Nội dung bài viết -->
        <div>
            <p>{{ $post->content }}</p>
            </div>
        </div>
        <!-- Hình của bài viết -->
        @if ($post->image != null)
            <img src="images/myPost/{{ $post->image }}" height="500">
        @endif
        <hr class="text-center">
        <!-- Lượt thích -->
        <div class="row ml-3 mr-3">
            @if($post->likes->count() > 0 )
                <div class="col-8">
                    <p>
                        <img src="images/like.png" width="20" height="20" alt="" srcset="">
                        <span>{{ $post->likes->count() }}</span>
                    </p>
                </div>
                @endif

                @if($post->comments->count() > 0 )
                    @if($post->likes->count() == 0 )
                    <div class="col-8"></div>
                    @endif
                <div class="col-2 text-right">
                    <p>{{ $post->comments->count() }} bình luận</p>
                </div>
                @endif
                @if($post->shares->count() > 0 )
                <div class="col-2 text-right">
                    <p>{{ $post->shares->count() }} Luợt chia sẻ</p>
                </div>
            @endif
        </div>
        <!-- Nút Like, Bình Luận, Chia Sẻ -->
        <div class="text-center p-auto m-auto" style="border-top:1px solid; width:70%" >
            <div class="row">
                <div class="col-4 ">
                    <?php
                        $tmp = 0;
                    ?>
                @foreach($likes as $like)
                        @if ($like->user_id ==$_SESSION['login']->user_id && $like->post_id ==$post->post_id)
                        <a href="/unlike?id={{$post->post_id}}">
                                <button class="btn btn-light">
                            <img src="images/like.png" width="25" height="25" alt="" srcset="">
                            Bỏ Thích
                                </button>
                            </a>
                        @else
                            <?php $tmp++; ?>
                        @endif
                    @endforeach
                    <?php
                    if($tmp == $likes->count()) :
                    ?>
                    <a href="/like?id={{$post->post_id}}">
                                <button class="btn btn-light">
                            <img src="images/like-white.png" width="25" height="25" alt="" srcset="">
                            Thích
                                </button>
                            </a>
                    <?php
                        endif;
                    ?>
                </div>
                <div class="col-4">
                    <button class="btn btn-light">
                        <img src="images/message.png" width="25" height="25" alt="" srcset="">
                        Bình Luận
                    </button>
                </div>
                <div class="col-3">
                <a href="/share?id={{$post->post_id}}">
                        <button class="btn btn-light">
                            <img src="images/share.png" width="25" height="25" alt="" srcset="">
                            Chia Sẻ
                        </button>
                    </a>
                </div>
            </div>
        </div>
        <!-- Nơi Nhập bình luận -->
       <div class="row container">
           <div class="col-1">
                @if ($_SESSION['login']->avatar == null)
                    <a href="#" class="rounded-circle"><img src="images/user.png" class="rounded-circle p-0 m-0" width="50px" height="50" alt="" srcset=""></a>
                @else
                    <a href="#" class="rounded-circle"><img src="images/avatar/<?php echo ($_SESSION['login']->avatar);  ?>" class="rounded-circle p-0 m-0" width="50px" height="50" alt="" srcset=""></a>
                @endif
           </div>
           <div class="col-7">
               <form action="/commentPost?id={{$post->post_id}}" method="post" enctype="multipart/form-data">
               @csrf
                    <input type="text" class="form-control" name="content" placeholder="Viết bình luận">

           </div>
           <div class="col-4">
               <input type="file" name="image" id="">
           </div>

           </form>
       </div>
       <!-- Nơi Xuất bình luận -->
       <div class="mt-4 ml-5">
           @foreach($comments as $comment)
                @if($comment->post_id == $post->post_id)
                <div class="row">
                    <div class="col-1">
                    @if($comment->user->avatar == null)
                        <img src="images/user.png" height="40" width="40" alt="">
                    @else
                        <img src="images/avatar/{{$comment->user->avatar}}" height="40" width="40" alt="">
                    @endif
                    </div>
                    <div class="col-10">
                        <label class="h6">{{$comment->user->name}}</label>
                        <label style="font-size:14px">{{ $comment->created_at->format('d/m__H:i') }}</label>
                        <div class="ml-3">
                            <p >{{$comment->content}}</p>
                                @if ($comment->image != null)
                                <img src="images/myComment/{{$comment->image}}" width="200" height="150" alt="" srcset="">
                                @endif
                        </div>
                    </div>
                </div>
                @endif
           @endforeach
       </div>
</div>

@endif
@endforeach

    @endsection


