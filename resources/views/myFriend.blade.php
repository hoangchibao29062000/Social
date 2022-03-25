@extends('myTemplate')
@section('myFriend')
    <div class="mt-3">
        <div class="row">
            <div class="card col-4" style="width:15rem">
                <div class="row mt-2">
                    <!-- Avatar bạn -->
                    <div class="col-3">
                        <img src="images/user.png" width="70" height="70" alt="" srcset="">
                    </div>
                    <!-- Tên của bạn -->
                    <div class="col-6 mt-3">
                    <p class="font-weight-bolder">Chí Bảo</p>
                    </div>
                    <!-- Thêm -->
                    <div class="col-3 text-right">
                        <button class="btn btn-light rounded-circle dropdown-friend">
                        <img src="images/dots.png" width="20" height="20" alt="" srcset="">
                            <div class="dropdown-content-friend">
                                <a class="btn btn-danger">Xóa</a>
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection