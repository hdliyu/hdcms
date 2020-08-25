<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title',site()['title'])</title>
    <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.13.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.bootcdn.net/ajax/libs/highlight.js/10.1.1/styles/rainbow.min.css" rel="stylesheet">
    <link href="/modules/Edu/app.css" rel="stylesheet">

</head>

<body class="front">
    <div class="{{ route_class() }}">
        @include('edu::layouts.header')
        <div class="container pr-0">
            @include('layouts.message')
        </div>

        <div class="container mt-3 mb-5 p-sm-1">
            <div class="row">
                <div class="col-12 col-sm-9 mb-3">
                    @yield('content')
                </div>

                <div class="col-sm-3 col-12">
                    @include('edu::layouts.user',['user'=>user()])
                    <div class="card rounded shadow-sm bg-white mt-2">
                        <div class="card-body p-0">
                            <div class="list-group list-group-flush">
                                <a href="https://www.houdunren.com/edu/space/1/topic"
                                    class="list-group-item list-group-item-action text-secondary ">
                                    会员周期
                                </a>
                                <a href="https://www.houdunren.com/edu/space/1/follower"
                                    class="list-group-item list-group-item-action text-secondary">
                                    我的订单
                                </a>
                                <a href="https://www.houdunren.com/edu/space/1/fans"
                                    class="list-group-item list-group-item-action text-secondary">
                                    我的贴子
                                </a>
                                <a href="https://www.houdunren.com/edu/space/1/lesson"
                                    class="list-group-item list-group-item-action text-secondary">
                                    站内消息
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @include('edu::layouts.footer')
    </div>
    @stack('scripts')
    <script src="/modules/Edu/app.js"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/highlight.js/10.1.1/highlight.min.js"></script>
    <script>
        hljs.initHighlightingOnLoad();
    </script>
</body>

</html>
