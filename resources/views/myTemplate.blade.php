<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}"> -->
   <!-- <style>
       .login{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
        }
   </style> -->
</head>
<body>
@include('block.header')
    <?php
        if(!empty($_SESSION['login'])) :
    ?>
        <!-- Header -->
    @include('block.header')
    <?php
        endif;
    ?>
    
        <!-- Content -->
        @yield('login')
        @yield('content')
    
    <?php
        if(empty($_SESSION['login'])) :
    ?>
        <!-- Footer -->
    @include('block.footer')
    <?php
        endif;
    ?>
</body>
</html>