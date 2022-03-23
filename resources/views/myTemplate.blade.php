<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/app.css') }}" />
   <style>
      
   </style>
</head>
<body>
    @if(isset($_SESSION['login']))
        <!-- Header -->
        @include('block.header')
        <!-- Content -->
        <div class="row" style="margin-top:90px;margin-right: 15px;">
            <div class=" bg-light col-2 col-lg-2 col-xl-2" style="width:1000px">
                @include('block.sidebar')
            </div>
            <!-- Trang chủ -->
            @if ($title == 'Trang Chủ')
                <div class="col-7 col-lg-7 col-xl-7">
                    @yield('content')
                </div>
                <div class="col-3 col-lg-3 col-xl-3"> 
                    @include('block.messages')
                </div>
            @endif

            <!-- Bài Viết Của Tôi -->
            @if ($title == "Bài Viết Của Tôi")
            <div class="col-10 col-lg-10 col-xl-10">
                @yield('myPost')
            </div>
            @endif
        </div>
    @else
        @yield('login')
        @yield('register')
    @endif
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>