<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/mystyle.css')}}">
</head>
<body>
    @include('includes.header')
    <div class="container">
        @yield('content')
    </div>
</body>
</html>