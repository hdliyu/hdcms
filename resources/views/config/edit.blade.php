@extends('layouts.admin')
@section('content')
    <nav class="nav nav-tabs nav-stacked">
        <a class="nav-link" href="{{route('admin.setting')}}">
            <i class="fa fa-home"></i>
        </a>
        <a class="nav-link active" href="{{route('admin.config.edit')}}">系统配置</a>
    </nav>
    <div class="card mt-3">
        <div class="card-header">
            系统配置
        </div>
        <div class="card-body">
              <x-input name="title" title="系统标题" value="{{$config['title']}}"></x-input>
              <x-input name="logo" title="logo" value="{{$config['logo']}}"></x-input>
              <x-input theme="textarea" name="copyright" theme="textarea" title="版权信息">{{$config['copyright']}}</x-input>
        </div>
        <div class="card-footer text-muted">
            <button class="btn btn-primary btn-sm">保存</button>
        </div>
    </div>
@endsection
