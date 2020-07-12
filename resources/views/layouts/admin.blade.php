<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','后台首页')</title>
    <link rel="stylesheet" href="{{mix('/css/app.css')}}">
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div class="system">
    @include('layouts.admin.header')
    <div class="d-md-block d-none">
    @include('layouts.admin.quick-menu')
    </div>
    <div class="bg-white rounded shadow m-3 p-4 {{ route_class() }}" id="app">
    @yield('content')
    </div>
    <div class="d-flex flex-column justify-content-center align-items-center mt-5">
        <strong>后盾人 人人做后盾</strong>
        <strong>Powerd by hdcms v6 2014-2020 www.hdcms.com</strong>
    </div>
</div>

<script src="{{mix('/js/app.js')}}"></script>
</body>
</html>


