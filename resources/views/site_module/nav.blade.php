<nav class="nav nav-tabs nav-stacked">
    <a class="nav-link" href="{{ route('admin') }}">
        <i class="fa fa-home" aria-hidden="true"></i>
    </a>
    <a class="nav-link active" href="#">
        模块列表
    </a>
</nav>
<div class="alert alert-info mt-3" role="alert">
    <i class="fa fa-info-circle" aria-hidden="true"></i> 下面是 {{ $site->title }} 站点的模块
</div>
