<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <!-- <link rel="stylesheet" href="../css/app.css"> -->
   <style>
       .login{
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
}
   </style>
</head>
<body>
    <!-- Navbar -->
    @include('navbar')
    <!-- Content -->
    @yield('content')
</body>
</html>