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
        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
         Bài Viết Của Bạn
        </button>
      </h2>
    </div>
    <!-- Nội Dung Xuất Ra -->
    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      @if(count($posts) > 0)
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
      @else
        <h5>Nay Không Có Hoạt Động Nào</h5>
      @endif
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
      @if(count($changeFriends) > 0)
      <div class="card-body">
        @foreach($changeFriends as $friend)
        <!-- Trường hợp người đăng nhập gởi lời kết bạn đến ai đó -->
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
                        {{$friend->created_at->format('H:i d-m-Y')}}
                    </div>
                    </div>
                </div>
            @endif
            <!-- Trường hợp người dùng đã là bạn với ai đó -->
            @if($friend->role == 1 && $friend->updated_at > $friend->created_at && ($friend->user_id_send == $_SESSION['login']->user_id ||$friend->user_id_get == $_SESSION['login']->user_id))
                <div class="card ">
                    <div class="row">
                    <div class="col-9">
                        @if($_SESSION['login']->avatar == null)
                            <img src="images/user.png" height="40" width="40" alt="" srcset="">
                        @else
                            <img src="images/avatar/<?php echo $_SESSION['login']->avatar?>" height="40" width="40" alt="" srcset="">
                        @endif
                        <label>
                           @if($friend->user_id_send == $_SESSION['login']->user_id)
                            <label class="font-weight-bold">{{$_SESSION['login']->name}}</label> và 
                                @if($friend->getUserGet->avatar == null)
                                    <img src="images/user.png" height="40" width="40" alt="" srcset="">
                                @else
                                    <img src="images/avatar/<?php echo $friend->getUserGet->avatar?>" height="40" width="40" alt="" srcset="">
                                @endif
                                <label class="font-weight-bold">{{$friend->getUserGet->name}}</label>
                                Đã là bạn của nhau
                            
                            @else
                                <label class="font-weight-bold">{{$_SESSION['login']->name}}</label> và 
                                @if($friend->getUserSend->avatar == null)
                                    <img src="images/user.png" height="40" width="40" alt="" srcset="">
                                @else
                                    <img src="images/avatar/<?php echo $friend->getUserSend->avatar?>" height="40" width="40" alt="" srcset="">
                                @endif
                                <label class="font-weight-bold">{{$friend->getUserSend->name}}</label>
                                Đã là bạn của nhau
                           @endif
                        </label>
                    </div>
                    <div class="col-2 text-right">
                        {{$friend->updated_at->format('H:i d-m-Y')}}
                    </div>
                    </div>
                </div>    
            @endif
            <!-- Trường hợp có người gởi lời kết bạn cho người đăng nhập-->
            @if(($friend->updated_at > $friend->created_at || $friend->role == 0) && $friend->user_id_get == $_SESSION['login']->user_id)
                <div class="card ">
                    <div class="row">
                    <div class="col-9">
                    <label>
                        @if($friend->getUserSend->avatar == null)
                            <img src="images/user.png" height="40" width="40" alt="" srcset="">
                        @else
                            <img src="images/avatar/<?php echo $friend->getUserSend->avatar?>" height="40" width="40" alt="" srcset="">
                        @endif
                        <label class="font-weight-bold">{{$friend->getUserSend->name}}</label>
                       
                            Đã gửi lời kết bạn đến
                        @if($_SESSION['login']->avatar == null)
                            <img src="images/user.png" height="40" width="40" alt="" srcset="">
                        @else
                            <img src="images/avatar/<?php echo $_SESSION['login']->avatar?>" height="40" width="40" alt="" srcset="">
                        @endif
                        
                        <label class="font-weight-bold">{{$_SESSION['login']->name}}</label>
                           
                    </label>
                    </div>
                    <div class="col-2 text-right">
                        {{$friend->created_at->format('H:i d-m-Y')}}
                    </div>
                    </div>
                </div>  
            @endif
        @endforeach
      </div>
      @else
      <h5>Nay Không Có Hoạt Động Nào</h5>
      @endif
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Lượt Thích
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
          <?php $flatLike = 0 ?>
        @if(count($likes) > 0)
            @foreach($likes as $like)
            <!-- Trường hợp ai đó hoặc người đăng nhập thích bài viết của chính mình -->
            @if($like->post->user_id == $_SESSION['login']->user_id)
            <div class="card ">
                <div class="row"> 
                    <div class="col-9">
                    <label>
                        @if($like->user->avatar == null)
                            <img src="images/user.png" height="40" width="40" alt="" srcset="">
                        @else
                            <img src="images/avatar/<?php echo $like->user->avatar?>" height="40" width="40" alt="" srcset="">
                            
                        @endif
                        <label class="font-weight-bold">{{$like->user->name}}</label>
                            Đã thích bài viết của
                        @if($like->post->user->user_id == $_SESSION['login']->user_id)
                            mình  
                        @else
                            @if($like->getUserUpPost->avatar == null)
                                <img src="images/user.png" height="40" width="40" alt="" srcset="">
                            @else
                                <img src="images/avatar/<?php echo $like->getUserUpPost->avatar?>" height="40" width="40" alt="" srcset="">
                            @endif
                            <label class="font-weight-bold">{{$like->getUserUpPost->name}}</label>
                        @endif
                    </div>
                        <div class="col-2 text-right">
                            {{$like->created_at->format('H:i d-m-Y')}}
                        </div>
                </div>
            </div>     
             <!-- Trường hợp người đăng nhập thích bài viết của người khác -->
            @elseif($like->user->user_id== $_SESSION['login']->user_id)
                <div class="card ">
                    <div class="row">
                        <div class="col-9">
                            <label>
                            @if($like->getUserLike->avatar == null)
                                <img src="images/user.png" height="40" width="40" alt="" srcset="">
                            @else
                                <img src="images/avatar/<?php echo $like->getUserLike->avatar?>" height="40" width="40" alt="" srcset="">
                            @endif
                            <label class="font-weight-bold">{{$like->getUserLike->name}}</label>
                                    Đã thích bài viết của 

                            @if($like->post->user->avatar == null)
                                <img src="images/user.png" height="40" width="40" alt="" srcset="">
                            @else
                                <img src="images/avatar/<?php echo $like->post->user->avatar?>" height="40" width="40" alt="" srcset="">
                            @endif
                            <label class="font-weight-bold">{{$like->post->user->name}}</label>
                            </label>
                            </div>
                        <div class="col-2 text-right">
                            {{$like->created_at->format('H:i d-m-Y')}}
                        </div>
                    </div>
                </div>
                   
            <!-- Trường hợp không có hoạt động gì cả -->
            @else
                <?php $flatLike++ ?>               
            @endif
            @if($flatLike == count($likes))
                        <h5>Không Có Hoạt Động Nào</h5>
            @endif           
            @endforeach
        @else
            <h5>Nay Không Có Hoạt Động Nào</h5>
        @endif
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingFour">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          Bình Luận
        </button>
      </h2>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
    <div class="card-body">
          <?php $flatComment = 0 ?>
        @if(count($comments) > 0)
            @foreach($comments as $comment)
            <!-- Trường hợp ai đó hoặc người đăng nhập bình luận bài viết của chính mình -->
            @if($comment->post->user_id == $_SESSION['login']->user_id)
            <div class="card ">
                <div class="row"> 
                    <div class="col-9">
                    <label>
                        @if($comment->user->avatar == null)
                            <img src="images/user.png" height="40" width="40" alt="" srcset="">
                        @else
                            <img src="images/avatar/<?php echo $comment->user->avatar?>" height="40" width="40" alt="" srcset="">
                            
                        @endif
                        <label class="font-weight-bold">{{$comment->user->name}}</label>
                            Đã bình luận bài viết của
                        @if($comment->post->user->user_id == $_SESSION['login']->user_id)
                            mình  
                        @else
                            @if($comment->getUserUpPost->avatar == null)
                                <img src="images/user.png" height="40" width="40" alt="" srcset="">
                            @else
                                <img src="images/avatar/<?php echo $comment->getUserUpPost->avatar?>" height="40" width="40" alt="" srcset="">
                            @endif
                            <label class="font-weight-bold">{{$comment->getUserUpPost->name}}</label>
                        @endif
                    </div>
                        <div class="col-2 text-right">
                            {{$comment->created_at->format('H:i d-m-Y')}}
                        </div>
                </div>
            </div>     
             <!-- Trường hợp người đăng nhập bình luận bài viết của người khác -->
            @elseif($comment->user->user_id== $_SESSION['login']->user_id)
                <div class="card ">
                    <div class="row">
                        <div class="col-9">
                            <label>
                            @if($comment->getUserComment->avatar == null)
                                <img src="images/user.png" height="40" width="40" alt="" srcset="">
                            @else
                                <img src="images/avatar/<?php echo $comment->getUserComment->avatar?>" height="40" width="40" alt="" srcset="">
                            @endif
                            <label class="font-weight-bold">{{$comment->getUserComment->name}}</label>
                                    Đã bình luận bài viết của 

                            @if($comment->post->user->avatar == null)
                                <img src="images/user.png" height="40" width="40" alt="" srcset="">
                            @else
                                <img src="images/avatar/<?php echo $comment->post->user->avatar?>" height="40" width="40" alt="" srcset="">
                            @endif
                            <label class="font-weight-bold">{{$comment->post->user->name}}</label>
                            </label>
                            </div>
                        <div class="col-2 text-right">
                            {{$comment->created_at->format('H:i d-m-Y')}}
                        </div>
                    </div>
                </div>
                   
            <!-- Trường hợp không có hoạt động gì cả -->
            @else
                <?php $flatComment++ ?>               
            @endif
            @if($flatComment == count($comments))
                        <h5>Không Có Hoạt Động Nào</h5>
            @endif           
               
            @endforeach
        @else
            <h5>Nay Không Có Hoạt Động Nào</h5>
        @endif
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingFive">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFine" aria-expanded="false" aria-controls="collapseFine">
          Chia Sẻ Bài Viết
        </button>
      </h2>
    </div>
    <div id="collapseFine" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
      
    <div class="card-body">
          <?php $flatShare = 0 ?>
        @if(count($shares) > 0)
            @foreach($shares as $share)
            <!-- Trường hợp ai đó hoặc người đăng nhập chia sẻ bài viết của chính mình -->
            @if($share->post->user_id == $_SESSION['login']->user_id)
            <div class="card ">
                <div class="row"> 
                    <div class="col-9">
                    <label>
                        @if($share->user->avatar == null)
                            <img src="images/user.png" height="40" width="40" alt="" srcset="">
                        @else
                            <img src="images/avatar/<?php echo $share->user->avatar?>" height="40" width="40" alt="" srcset="">
                            
                        @endif
                        <label class="font-weight-bold">{{$share->user->name}}</label>
                            Đã chia sẻ bài viết của
                        @if($share->post->user->user_id == $_SESSION['login']->user_id)
                            mình  
                        @else
                            @if($share->getUserUpPost->avatar == null)
                                <img src="images/user.png" height="40" width="40" alt="" srcset="">
                            @else
                                <img src="images/avatar/<?php echo $share->getUserUpPost->avatar?>" height="40" width="40" alt="" srcset="">
                            @endif
                            <label class="font-weight-bold">{{$share->getUserUpPost->name}}</label>
                        @endif
                    </div>
                        <div class="col-2 text-right">
                            {{$share->created_at->format('H:i d-m-Y')}}
                        </div>
                </div>
            </div>     
             <!-- Trường hợp người đăng nhập chia sẻ bài viết của người khác -->
            @elseif($share->user->user_id== $_SESSION['login']->user_id)
                <div class="card ">
                    <div class="row">
                        <div class="col-9">
                            <label>
                            @if($share->getUserShare->avatar == null)
                                <img src="images/user.png" height="40" width="40" alt="" srcset="">
                            @else
                                <img src="images/avatar/<?php echo $share->getUserShare->avatar?>" height="40" width="40" alt="" srcset="">
                            @endif
                            <label class="font-weight-bold">{{$share->getUserShare->name}}</label>
                                    Đã chia sẻ bài viết của 

                            @if($share->post->user->avatar == null)
                                <img src="images/user.png" height="40" width="40" alt="" srcset="">
                            @else
                                <img src="images/avatar/<?php echo $share->post->user->avatar?>" height="40" width="40" alt="" srcset="">
                            @endif
                            <label class="font-weight-bold">{{$share->post->user->name}}</label>
                            </label>
                            </div>
                        <div class="col-2 text-right">
                            {{$share->created_at->format('H:i d-m-Y')}}
                        </div>
                    </div>
                </div>
                   
            <!-- Trường hợp không có hoạt động gì cả -->
            @else
                <?php $flatShare++ ?>               
            @endif
            @if($flatShare == count($shares))
                        <h5>Không Có Hoạt Động Nào</h5>
            @endif          
            @endforeach
        @else
            <h5>Nay Không Có Hoạt Động Nào</h5>
        @endif
      </div>
      </div>
  </div>
</div>
@endsection