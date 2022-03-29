<?php
    $flag = 0;
    for ($i=0; $i < count($friends) ; $i++) { 
        if($friends[$i]->role == 0 && $friends[$i]->user_id_get ==$_SESSION['login']->user_id){
            $flag++;
        }
    }
    if($flag > 0){
?>
    <div class="row navbar-light bg-light">
        <div class="col-6 mt-2">
            <p class="text-secondary font-weight-bold h5">Lời mời kết bạn</p>
        </div>
        <div class="col-6 mt-2 text-right">
            <a href="/listAddFriend">Xem tất cả</a>
        </div>
        @foreach ($friends as $friend)
        <!-- Trường hợp có người gởi lời kết bạn cho mình -->
            @if($friend->role == 0 && $friend->user_id_get ==$_SESSION['login']->user_id)
                <!-- Avatar -->
                <div class="col-2">
                    @if ($friend->getUserSend->avatar == null)
                        <a href="/myInfo?id=<?php echo $friend->getUserSend->user_id; ?>" class="btn btn-light" style="border-radius: 360px;"><img src="images/user.png" width="40" height="40" alt="" srcset=""></a>
                    @else
                        <a href="/myInfo?id=<?php echo $friend->getUserSend->user_id; ?>" class="btn btn-light" style="border-radius: 360px;"><img src="images/avatar/<?php echo $friend->getUserSend->avatar; ?>" width="40" height="40" alt="" srcset=""></a>
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
                            <a class="btn btn-primary form-control" href="/submitFriend?id={{$friend->id}}">Xác Nhận</a>
                        </div>
                        <div class="col-6">
                            <a class="btn btn-secondary form-control" href="/deleteInviteFriend?id={{$friend->id}}">Xóa</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach                
    </div>
<?php 
    }
?>