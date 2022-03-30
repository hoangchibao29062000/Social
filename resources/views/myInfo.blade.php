@extends('myTemplate')
@section('myInfo')
   <div class="row mt-3">
        <div class="col-7">
            <div class="row">
                <!-- Avatar -->
                <div class="col-2">
                    @if($users[0]['avatar'] == null)
                        <img src="/images/user.png" alt="" srcset="" width="120" height="120" class="rounded-circle">
                    @else
                        <img src="/images/avatar/<?php echo ($users[0]['avatar']);  ?>" class="rounded-circle" alt="" srcset="" width="120" height="120">
                    @endif
                </div>
                <div class="col-10">
                    <div class="row">
                        <!-- Tên Người Dùng -->
                        <div class="col-6">
                            <h4>{{$users[0]['name']}}</h4>
                        </div>
                        <!-- Chỉnh Sửa Thông Tin -->
                        <div class="col-6">
                            @if($users[0]['user_id'] == $_SESSION['login']->user_id)
                                <button class="btn btn-primary text-right" data-toggle="modal" data-target="#editInfoModal">Chỉnh Sửa Thông Tin</button>
                            @endif
                            <!-- Modal -->
                            <div class="modal fade" id="editInfoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Chỉnh Sửa Thông Tin</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <!-- Body Modal -->
                                    <form action="/editUser" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <label style="font-size:20px; font-weight:bold">Avatar</label> <br>
                                            <input type="file" name="avatar"/> <br>
                                            <label style="font-size:20px; font-weight:bold">Tên Cá Nhân</label> <br>
                                            <input type="text" name="name" class="form-control" value="{{$users[0]['name']}}"/>
                                            <label style="font-size:20px; font-weight:bold">Email</label> <br>
                                            <input type="email" name="email" class="form-control" value="{{$users[0]['email']}}"/>
                                            <label style="font-size:20px; font-weight:bold">Số Điện Thoại</label> <br>
                                            <input type="text" name="phone" class="form-control" value="{{$users[0]['phone']}}"/>
                                            <label style="font-size:20px; font-weight:bold">Địa chỉ</label> <br>
                                            <input type="text" name="address" class="form-control" value="{{$users[0]['address']}}"/>
                                        
                                        </div>
                                        <!-- Nút Submit -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary form-control">Đồng Ý</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!-- Số bạn bè -->
                        <div class="col-6">
                            <?php 
                                $flag = 0;
                                for ($i=0; $i < count($friends); $i++) { 
                                    if($friends[$i]['role'] == 1 && ($users[0]['user_id'] == $friends[$i]['user_id_send'] || $users[0]['user_id'] == $friends[$i]['user_id_get'])){
                                        $flag++;
                                    }
                                }
                                echo $flag;
                            ?> bạn bè
                        </div>
                    </div>
                </div>
            </div>
            <!-- Thông Tin Cá Nhân -->
            <h3>Giới Thiệu</h3>
            <p style="font-size:20px">
                <img src="images/myInfo/arroba.png" width="40" height="40" alt="" srcset="">
                {{$users[0]['email']}}
            </p>
            <p style="font-size:20px">
                <img src="images/myInfo/home-page.png" width="40" height="40" alt="" srcset="">
                {{$users[0]['address']}}
            </p>
            <p style="font-size:20px">
                <img src="images/myInfo/phone-call.png" width="40" height="40" alt="" srcset="">
                {{$users[0]['phone']}}
            </p>
            <p style="font-size:20px">
                @if ($users[0]['gender']== 'Nam' || $users[0]['gender']== 'nam')
                    <img src="images/myInfo/mars.png" width="40" height="40" alt="" srcset="">
                    {{$users[0]['gender']}}
                @else
                    <img src="images/myInfo/femenine.png" width="40" height="40" alt="" srcset="">
                    {{$users[0]['gender']}}
                @endif
            </p>
        </div>
        <div class="col-4">
            <!-- Nơi Xuất Danh Sách Bạn Bè -->
            <h3>Danh Sách Bạn Bè</h3>
            <?php $tmp = 0?>
            <div class="row">
                @foreach($friends as $friend)
                <!-- Trường hợp đã kết bạn và người gửi là người đăng nhập -->
                    @if($friend->role == 1 && $friend->user_id_send == $users[0]['user_id'])
                        <div class="col-5 mr-4 mb-2 card">
                            <a href="/myInfo?id=<?php echo $friend->user_id_get; ?>">
                                @if($friend->getUserGet->avatar != null && $friend->user_id_get != $users[0]['user_id'])
                                    <img src="images/avatar/{{$friend->getUserGet->avatar}}" height="200px" class="card-img-top" alt="...">
                                @else
                                    <img src="images/user.png" class="card-img-top" height="200px" alt="...">
                                @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{$friend->getUserGet->name}}</h5>
                                    </div>
                            </a>
                        </div>
                <!-- Trường hợp đã kết bạn và người nhận là người đăng nhập -->
                    @elseif($friend->role == 1 && $friend->user_id_get == $users[0]['user_id'])
                        <div class="col-5 mr-4 mb-2 card">
                            <a href="/myInfo?id=<?php echo $friend->user_id_send; ?>">
                                @if($friend->getUserSend->avatar != null && $friend->user_id_send != $users[0]['user_id'])
                                    <img src="images/avatar/{{$friend->getUserSend->avatar}}" height="200px" class="card-img-top" alt="...">
                                @else
                                    <img src="images/user.png" class="card-img-top" height="200px" alt="...">
                                @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{$friend->getUserSend->name}}</h5>
                                    </div>
                            </a>
                        </div>
                    @else
                        <?php $tmp++ ;?>
                    @endif
                @endforeach
                @if($tmp ==$friends->count())
                <h6 class="text-secondary">Chưa có bạn bè </h6>
                @endif
            </div>
        </div>
   </div>
    
@endsection
