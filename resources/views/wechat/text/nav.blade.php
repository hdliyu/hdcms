<nav class="nav nav-tabs nav-stacked mb-3">

    <a class="nav-link {{ active_class(if_route('wechat.text.index')) }}"
        href="{{ route('wechat.text.index') }}">文本消息</a>

    <a class="nav-link {{ active_class(if_route('wechat.text.create')) }}"
        href="{{ route('wechat.text.create') }}">添加文本消息</a>

    @if( active_class(if_route('wechat.text.edit') ))
    <a class="nav-link active" href="#">编辑系统课程</a>
    @endif
</nav>
