<nav class="nav nav-tabs nav-stacked">
    <a class="nav-link" href="{{route('admin.setting')}}">
        <i class="fa fa-home"></i>
    </a>
    <a class="nav-link {{active_class(if_route('site.role.index'))}}" href="{{route('site.role.index',$site)}}">角色列表</a>
    <a class="nav-link {{active_class(if_route('site.role.create'))}}" href="{{route('site.role.create',$site)}}">添加角色</a>
    @if(if_route('site.role.edit'))
    <a class="nav-link active" href="#">修改角色</a>
     @endif
</nav>
<div class="alert alert-info mt-3" role="alert">
    <i class="fa fa-info-circle" aria-hidden="true"></i>
    你正在编辑「{{ $site->title }}」 站点的角色
</div>
