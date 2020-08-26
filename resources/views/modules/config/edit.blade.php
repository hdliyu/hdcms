@extends('layouts.module')
@section('content')
<nav class="nav nav-tabs nav-stacked mb-2">
    <a class="nav-link active" href="#">模块配置</a>
</nav>
<form action="{{ route('module.config.update') }}" method="post">
    @csrf
    @method('put')
    @include(strtolower(module()['name']).'::core.config.edit')
    <div class="mt-3">
        <button class="btn btn-primary btn-sm">保存提交</button>
    </div>
</form>
@endsection
