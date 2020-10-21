<nav class="nav nav-tabs nav-stacked mb-3">
    <a class="nav-link {{ active_class(if_route('wechat.news.index')) }}"
        href="{{ route('wechat.news.index') }}">图文消息</a>

    <a class="nav-link {{ active_class(if_route('wechat.news.create')) }}"
        href="{{ route('wechat.news.create') }}">添加图文消息</a>

    @if( active_class(if_route('wechat.news.edit') ))
    <a class="nav-link active" href="#">编辑图文消息</a>
    @endif
</nav>
