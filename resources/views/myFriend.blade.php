@extends('myTemplate')
@section('myFriend')
<?php
    $listFriend = array();
?>
    <div class="mt-3">
        <h3>Danh Sách Chờ Đồng Ý Kết Bạn</h3>
        <div class="row">
            @foreach ($friends as $friend)
            <!-- Trường hợp có người gởi lời kết bạn cho mình -->
                @if($friend->role == 1 && $friend->user_id_send ==$_SESSION['login']->user_id || $friend->user_id_get ==$_SESSION['login']->user_id)
                    <!-- <div class="card col-3 mr-3">
                        <p>{{$friend->getUserSend->name}}</p>
                        <button class="btn btn-primary">Đồng Ý</button>
                        <button class="btn btn-secondary">Đóng</button>
                    </div> -->
                    <?php $listFriend[] = $friend->getUserSend->name ?>
            <!-- Trường hợp mình gởi lời kết bạn cho người khác -->
                @elseif ($friend->role == 0 && $friend->user_id_send ==$_SESSION['login']->user_id)
                    <a href="/myInfo?id=<?php echo $friend->getUserGet->user_id ?>">
                        <div class="card col-3 mr-3">
                            <p><b>{{$friend->getUserGet->name}}</b></p>
                            @if($friend->getUserGet->avatar == null)
                                <img src="images/user.png" alt="" srcset="" height="200"class="card-img-top" srcset="">
                            @else
                                <img src="images/avatar/{{$friend->getUserGet->avatar}}"height="200" class="card-img-top" alt="" srcset="">
                            @endif
                            <p>Đã gửi lời kết bạn</p>
                            <a href="/deleteInviteFriend?id={{$friend->id}}" class="btn btn-secondary">Hủy</a>
                        </div>
                    </a>
                    
                    <?php $listFriend[] = $friend->getUserGet->name ?>
               <!-- Trường hợp mình đã là bạn -->
               @elseif ($friend->role == 2 && $friend->user_id_send ==$_SESSION['login']->user_id)
                <?php $listFriend[] = $friend->getUserGet->name ?>
                @elseif ($friend->role == 2 && $friend->user_id_get ==$_SESSION['login']->user_id)
                <?php $listFriend[] = $friend->getUserSend->name ?>
                @endif
            @endforeach
        </div>
        <!-- Trường hợp chưa gởi lời kết bạn nào -->
        <h3 class="mt-3">Danh sách gợi ý</h3>
        <div class="row">
            @foreach ($users as $user)
                <?php
                    if($user->user_id != $_SESSION['login']->user_id && !in_array($user->name,$listFriend)) :
                ?>
                    <a href="/myInfo?id=<?php echo $user->user_id ?>">
                        <div class="card col-2 mr-2" style="width: 18rem;">
                            @if($user->avatar == null)
                                <img src="images/user.png" alt="" srcset="" height="200"class="card-img-top" srcset="">
                            @else
                                <img src="images/avatar/{{$user->avatar}}"height="200" class="card-img-top" alt="" srcset="">
                            @endif
                            <p><b>{{$user->name}}</b></p>
                                <a href="/madefriend?send=<?php echo($_SESSION['login']->user_id) ?>&&get=<?php echo $user->user_id; ?>" class="btn btn-primary">Thêm Bạn Bè</a>
                        </div>
                    </a>
                <?php
                    endif; 
                ?>
            @endforeach
            </div>
    </div>
@endsection
