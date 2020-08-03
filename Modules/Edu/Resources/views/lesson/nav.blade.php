<nav class="nav nav-tabs nav-stacked">
    <a class="nav-link" href="{{ route('edu.admin.index') }}">
        <i class="fa fa-home" aria-hidden="true"></i>
    </a>
    <a class="nav-link {{ active_class(if_route('edu.admin.lesson.index')) }}"
       href="{{ route('edu.admin.lesson.index') }}">课程列表</a>
    <a class="nav-link {{ active_class(if_route('edu.admin.lesson.create')) }}"
       href="{{ route('edu.admin.lesson.create') }}">添加课程</a>
    @if( active_class(if_route('edu.admin.lesson.edit') ))
        <a class="nav-link active" href="#">编辑课程</a>
    @endif
</nav>
