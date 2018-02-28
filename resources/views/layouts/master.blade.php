<!doctype html>
<html lang="en">
<head>
       <title>CRUD Operation</title>
    <link rel="stylesheet" href="{{URL::to('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/style.css')}}">
</head>
<body>
<div class="container">
    <div class="page-header">
        @yield('header')
    </div>
    @yield('content')
</div>
<script src="{{URL::to('js/bootstrap.js')}}"></script>
<script src="{{URL::to('js/script.js')}}"></script>

</body>
</html>