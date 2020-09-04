<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title',site()['title'])</title>
    <link rel="stylesheet" href="{{mix('modules/Edu/app.css')}}">
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.14.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.bootcdn.net/ajax/libs/highlight.js/10.1.1/styles/rainbow.min.css" rel="stylesheet">
    <script>
        window.user = @json(['id'=>user('id'),'nickname'=>user('name')]);
    </script>
</head>
<body class="front">
<div class="{{ route_class() }}" id="app">
    @include('edu::layouts.header')
    <div class="container mt-3">
        @include('layouts.message')
    </div>
    @yield('content')
    @include('edu::layouts.footer')
</div>
@stack('vue')
<script src="{{mix('modules/Edu/app.js')}}"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/highlight.js/10.1.1/highlight.min.js"></script>
<script>
    hljs.initHighlightingOnLoad();
</script>
@stack('scripts')
</body>
</html>
