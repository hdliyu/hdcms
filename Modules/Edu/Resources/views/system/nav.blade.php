<nav class="nav nav-tabs nav-stacked">

    <a class="nav-link" href="{{ route('edu.admin.index') }}">
        <i class="fa fa-home" aria-hidden="true"></i>
    </a>

    <a class="nav-link {{ active_class(if_route('edu.admin.system.index')) }}"
        href="{{ route('edu.admin.system.index') }}">系统课程列表</a>

    <a class="nav-link {{ active_class(if_route('edu.admin.system.create')) }}"
        href="{{ route('edu.admin.system.create') }}">添加系统课程</a>

    @if( active_class(if_route('edu.admin.system.edit') ))
    <a class="nav-link active" href="#">编辑系统课程</a>
    @endif
</nav>
