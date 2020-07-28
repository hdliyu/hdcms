<nav class="nav nav-tabs nav-stacked">
    <a class="nav-link" href="{{ route('admin') }}">
        <i class="fa fa-home" aria-hidden="true"></i>
    </a>
    <a class="nav-link {{ active_class(if_route('site.admin.index')) }}"
       href="{{ route('site.admin.index',$site) }}">管理员列表</a>
    @if( active_class(if_route('site.admin.role') ))
        <a class="nav-link active" href="#">设置角色</a>
    @endif
</nav>
