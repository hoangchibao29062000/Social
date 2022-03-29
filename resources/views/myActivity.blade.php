<?php
// Lấy ngày hiện tại
use Carbon\Carbon;
?>
@extends('myTemplate')
@section('myActivity')
    <h3>Hôm nay là ngày <?php echo Carbon::now()->format('d-m-Y'); ?></h3>
    <h5>Bạn đã làm gì??</h5>
    <div class="accordion" id="accordionExample">
  <div class="card">
      <!-- Bài Viết Của Tôi -->
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         Bài Viết Của Bạn
        </button>
      </h2>
    </div>
    <!-- Nội Dung Xuất Ra -->
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        @foreach($posts as $post)
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
                        <a class="btn btn-danger">Xóa</a>
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
                @foreach($dataLikes as $like)
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
                    if($tmp == $dataLikes->count()) :
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
           @foreach($dataComments as $comment)
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
      </div>
    </div>
  </div>
  <!-- Kết Thúc Bài Viết Của Tôi -->
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Quan Hệ Bạn Bè
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        @foreach($changeFriends as $friend)
            @if(($friend->updated_at > $friend->created_at || $friend->role == 0) && $friend->user_id_send == $_SESSION['login']->user_id)
                <div class="card ">
                    <div class="row">
                    <div class="col-9">
                        @if($_SESSION['login']->avatar == null)
                            <img src="images/user.png" height="40" width="40" alt="" srcset="">
                        @else
                            <img src="images/avatar/<?php echo $_SESSION['login']->avatar?>" height="40" width="40" alt="" srcset="">
                        @endif
                        <label>
                        <label class="font-weight-bold">{{$_SESSION['login']->name}}</label>
                            Đã gửi lời kết bạn đến
                            @if($friend->getUserGet->avatar == null)
                                <img src="images/user.png" height="40" width="40" alt="" srcset="">
                            @else
                                <img src="images/avatar/<?php echo $friend->getUserGet->avatar?>" height="40" width="40" alt="" srcset="">
                            @endif
                            <label class="font-weight-bold">{{$friend->getUserGet->name}}</label>
                        </label>
                    </div>
                    <div class="col-2 text-right">
                        {{$friend->created_at->format('H:i:s d-m-Y')}}
                    </div>
                    </div>
                </div>
            @endif
            @if($friend->role == 2 && $friend->updated_at > $friend->created_at && $friend->user_id_send == $_SESSION['login']->user_id)
                <div class="card ">
                    <div class="row">
                    <div class="col-9">
                    @if($_SESSION['login']->avatar == null)
                            <img src="images/user.png" height="40" width="40" alt="" srcset="">
                        @else
                            <img src="images/avatar/<?php echo $_SESSION['login']->avatar?>" height="40" width="40" alt="" srcset="">
                        @endif
                        <label>
                            <label class="font-weight-bold">{{$_SESSION['login']->name}}</label> và 
                            @if($friend->getUserGet->avatar == null)
                                <img src="images/user.png" height="40" width="40" alt="" srcset="">
                            @else
                                <img src="images/avatar/<?php echo $friend->getUserGet->avatar?>" height="40" width="40" alt="" srcset="">
                            @endif
                            <label class="font-weight-bold">{{$friend->getUserGet->name}}</label>
                            Đã là bạn của nhau
                            
                            
                        </label>
                    </div>
                    <div class="col-2 text-right">
                        {{$friend->updated_at->format('H:i:s d-m-Y')}}
                    </div>
                    </div>
                </div>    
            @endif
        @endforeach
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
@endsection