<nav class="nav nav-tabs nav-stacked">

    <a class="nav-link" href="{{ route('edu.admin.index') }}">
        <i class="fa fa-home" aria-hidden="true"></i>
    </a>

    <a class="nav-link {{ active_class(if_route('edu.admin.subscribe.index')) }}"
       href="{{ route('edu.admin.subscribe.index') }}">套餐列表</a>

    <a class="nav-link {{ active_class(if_route('edu.admin.subscribe.create')) }}"
       href="{{ route('edu.admin.subscribe.create') }}">添加套餐</a>

    @if(if_route('edu.admin.subscribe.edit'))
        <a class="nav-link active" href="#">编辑套餐</a>
    @endif
</nav>
