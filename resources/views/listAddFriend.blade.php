@extends('myTemplate')
@section('listAddFriend')
<div class="row mt-2">
    <!-- 1 Obj -->
    <div class="col-6">
        <?php $listFollower = array(); ?>
        @foreach ($friends as $friend)
        <!-- Trường hợp có người gởi lời kết bạn cho mình -->
        @if($friend->role == 0 && $friend->user_id_get ==$_SESSION['login']->user_id)
                    <!-- Avatar -->
                    <div class="col-2">
                        @if ($friend->getUserSend->avatar == null)
                        <button class="btn btn-light" style="border-radius: 360px;"><img src="images/user.png" width="40" height="40" alt="" srcset=""></button>
                        @else
                        <button class="btn btn-light" style="border-radius: 360px;"><img src="images/avatar/<?php echo $friend->getUserSend->avatar; ?>" width="40" height="40"" alt="" srcset=""></button>
                        @endif
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-8">
                                <p>{{$friend->getUserSend->name}}</p>
                            </div>
                            <div class="col-4 text-right">
                                <p>{{$friend->created_at->format('d/m__H:i')}}</p>
                            </div>
                            <div class="col-6">
                                <a href="/submitFriend?id={{$friend->id}}" class="btn btn-primary form-control">Xác Nhận</a>
                            </div>
                            <div class="col-6">
                                <a href="/deleteInviteFriend?id={{$friend->id}}" class="btn btn-secondary form-control">Xóa</a>
                            </div>
                        </div>
                    </div>
                    <?php $listFollower[] = $friend->getUserSend->name ?>
                    <!-- Trường hợp mình gởi lời kết bạn -->
                @elseif ($friend->role == 0 && $friend->user_id_send ==$_SESSION['login']->user_id)
                    <?php $listFollower[] = $friend->getUserGet->name ?>
                    <!-- Trường hợp mình đã là bạn -->
                @elseif ($friend->role == 2 && $friend->user_id_send ==$_SESSION['login']->user_id)
                <?php $listFollower[] = $friend->getUserGet->name ?>
                @elseif ($friend->role == 2 && $friend->user_id_get ==$_SESSION['login']->user_id)
                <?php $listFollower[] = $friend->getUserSend->name ?>
                @endif
    @endforeach           
    </div>
</div>
    <h3 class="mt-3">Danh sách gợi ý</h3>
    <div class="row">
            @foreach ($users as $user)
            <?php
                if($user->user_id != $_SESSION['login']->user_id && !in_array($user->name,$listFollower)) :
            ?>        
                
                <div class="card col-2 mr-2" style="width: 18rem;">
                    @if($user->avatar == null)
                    <img src="images/user.png" alt="" srcset="" height="200"class="card-img-top" srcset="">
                    @else
                    <img src="images/avatar/{{$user->avatar}}" class="card-img-top" alt="" srcset="">
                    @endif
                    <p>{{$user->name}}</p>
                    <a href="/madefriend?send=<?php echo($_SESSION['login']->user_id) ?>&&get=<?php echo $user->user_id; ?>" class="btn btn-primary">Thêm Bạn Bè</a>
                </div>
                <?php
                    endif; 
                ?>
                        
            @endforeach
        </div>
    @endsection