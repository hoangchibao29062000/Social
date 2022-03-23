<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"> -->
   <style>
       .login{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
        }
        .active {
            border-bottom: blue solid 3px;
        }
        /* Kiểu nút Dropdown */
            .dropbtn {
               
                color: white;
                font-weight: bold;
                padding: 16px;
                font-size: 16px;
                border: none;
                cursor: pointer;
            }

            /* Dùng trong <div> để định vị nội dung thả xuống */
            .dropdown {
                position: relative;
                display: inline-block;
            }

            /* Nội dung thả xuống (Ẩn theo mặc định) */
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: white;
                min-width: 200px;
                right: 10px;
                /* box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                z-index: 1; */
            }

            /* Liên kết bên trong danh sách thả xuống */
           
            /* Hiển thị menu thả xuống khi di chuột */
            .dropdown:hover .dropdown-content {
                display: block;
            }
   </style>
</head>
<body>
{{-- @include('block.header') --}}
    <?php
        if(!empty($_SESSION['login'])) :
    ?>
        <!-- Header -->
        @include('block.header')
    <?php
        endif;
    ?>
    <?php
        if(!empty($_SESSION['login'])) :
    ?>
        <!-- Content -->
        <div class="row" style="margin-top:90px;margin-right: 15px;">
            <div class=" bg-light col-2 col-lg-2 col-xl-2 fixed-left" style="width:1000px">
                    @include('block.sidebar')
            </div>
            <div class="col-7 col-lg-7 col-xl-7">
                @yield('content')
            </div>
            <div class="col-3 col-lg-3 col-xl-3"> 
                    @include('block.messages')
                
            </div>
        </div>
    <?php
        endif;
    ?>   
    
    <?php
        if(empty($_SESSION['login'])) :
    ?>
       @yield('login')
    <?php
        endif;
    ?>
</body>
</html>