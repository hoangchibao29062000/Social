@extends('myTemplate')
@section('myFriend')
<?php
    $listFriend = array();
?>
    <div class="mt-3">
        <div class="row">
            @foreach ($friends as $friend)
                @if($friend->role == 1 && $friend->user_id_send ==$_SESSION['login']->user_id || $friend->user_id_get ==$_SESSION['login']->user_id)
                    <div class="card col-3 mr-3">
                        <p>{{$friend->getUserSend->name}}</p>
                        <button class="btn btn-primary">Đồng Ý</button>
                        <button class="btn btn-secondary">Đóng</button>
                    </div>
                    <?php $listFriend[] = $friend->getUserSend->name ?>
                @elseif ($friend->role == 0 && $friend->user_id_send ==$_SESSION['login']->user_id)
                    <div class="card col-3 mr-3">
                        <p>{{$friend->getUserGet->name}}</p>
                        <p>Đã gửi lời kết bạn</p>
                        <button class="btn btn-secondary">Hủy</button>
                    </div>
                    <?php $listFriend[] = $friend->getUserGet->name ?>
                @endif
            @endforeach
        </div>
   
        <h3 class="mt-3">Danh sách gợi ý</h3>
        @foreach ($users as $user)
        <?php
             if($user->user_id != $_SESSION['login']->user_id && !in_array($user->name,$listFriend)) :
                
        ?>        
             <div class="card">
                 <p>{{$user->name}}</p>
                 <a href="/madefriend?send=<?php echo($_SESSION['login']->user_id) ?>&&get=<?php echo $user->user_id; ?>" class="btn btn-primary">Thêm Bạn Bè</a>
             </div>
        <?php
            endif; 
        ?>
                      
        @endforeach
    </div>
@endsection