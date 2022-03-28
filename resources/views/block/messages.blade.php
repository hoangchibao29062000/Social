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
                                <button class="btn btn-primary form-control">Xác Nhận</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-secondary form-control">Xóa</button>
                            </div>
                        </div>
                    </div>
                @endif
    @endforeach                
    
</div>