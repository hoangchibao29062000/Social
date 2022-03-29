@extends('myTemplate')
@section('myPost')

@if($_SESSION['login']->user_id !== null)

@foreach ($shares as $share)
@if($share->user_id_share == $_SESSION['login']->user_id)
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
                            <div class="col-5">
                                <label class="h4" href="#" class="text-left">{{ $share->user->name }}</label>
                                <label>Shared from
                                    @if($share->post->user_id == $share->user_id_share)
                                    me
                                    @else
                                    {{ $share->post->user->name }}
                                    @endif
                                at {{ $share->created_at->format('H:i__d/m') }}</label>
                            </div>
                            @if($share->user->user_id == $_SESSION['login']->user_id)
                            <div class="col-6 text-right">
                                <button class="btn btn-light dropdown-share" style="border-radius: 360px;"><img src="images/dots.png" width="20" height="20" alt="" srcset="">
                                    <div class="dropdown-content-share">
                                        <a class="btn btn-info">Chỉnh Sửa</a>
                                        <a class="btn btn-danger"  href="/deleteShare?id={{ $share->id }}">Xóa</a>
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
                                    <img src="images/myPost/{{ $share->post->image }}" height="500" width="100%" alt="">
                                @endif
                        </div>
                        <!-- Lượt thích -->
<div class="row ml-3 mr-3">
    @if($share->likes->count() > 0 )
    <div class="col-8">
        <p>
            <img src="images/like.png" width="20" height="20" alt="" srcset="">
            <span>{{ $share->likes->count() }}</span>
            </p>
        </div>
        @endif

        @if($share->comments->count() > 0 )
            @if($share->likes->count() == 0 )
            <div class="col-8"></div>
            @endif
        <div class="col-2 text-right">
            <p>{{ $share->comments->count() }} bình luận</p>
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
                @if ($like->user_id ==$_SESSION['login']->user_id && $like->post_id ==$share->post_id)
                <a href="/unlike?id={{$post->id}}">
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
            <a href="/like?id={{$share->id}}">
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

    </div>
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach

  @foreach ($posts as $post)

  <div class="card mt-4 ml-5" style="width:62rem">
    <div class="card-body">
        <!-- Tài khoản đăng -->
        <div class="row">
            <div class="col-1">
                @if ($_SESSION['login']->avatar == null)
                    <a href="#" class="rounded-circle"><img src="images/user.png" class="rounded-circle p-0 m-0" width="50px" height="50" alt="" srcset=""></a>
                @else
                    <a href="#" class="rounded-circle"><img src="images/avatar/{{$post->user->avatar }}" class="rounded-circle p-0 m-0" width="50px" height="50" alt="" srcset=""></a>
                @endif
            </div>
            <div class="col-9 text-left">
                <p class="h5"> {{$post->user->name }}</p>
                <p class="text-secondary">{{ $post->created_at->format('d/m_____H:i') }}<img src="images/friends.png" width="20" height="20" alt="" srcset=""></p>
            </div>
            <div class="col-2 text-right">
                <button class="btn btn-light dropdown-friend" style="border-radius: 360px;"><img src="images/dots.png" width="20" height="20" alt="" srcset="">
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
        @if ($post->image != null)
            <img src="images/myPost/{{ $post->image }}" height="500">
        @endif
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

                @if($post->comments->count() > 0 )
                    @if($post->likes->count() == 0 )
                    <div class="col-10"></div>
                    @endif
                <div class="col-2 text-right">
                    <p>{{ $post->comments->count() }} bình luận</p>
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
                    <button class="btn btn-light">
                        <img src="images/share.png" width="25" height="25" alt="" srcset="">
                        Chia Sẻ
                    </button>
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
           <div class="col-6">
               <form action="/commentPost?id={{$post->post_id}}" method="post" enctype="multipart/form-data">
               @csrf
                    <input type="text" class="form-control" name="content" placeholder="Viết bình luận">

           </div>
           <div class="col-3">
               <input type="file" name="image" id="">
           </div>
           <div class="col-2">
               <button type="submit" class="btn btn-primary">Xác Nhận</button>
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
                        <img src="images/user.png"height="40" width="40" alt="">
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

    @endforeach
@endif

@endsection
