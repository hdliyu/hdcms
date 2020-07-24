@extends('layouts.admin')
@section('content')
    <nav class="nav nav-tabs nav-stacked">
        <a class="nav-link" href="{{route('admin.setting')}}">
            <i class="fa fa-home"></i>
        </a>
        <a class="nav-link active" href="#">系统配置</a>
    </nav>
    <form action="{{route('admin.config.update')}}" method="post">
        @csrf
        @method('PUT')
    <div class="card mt-3">
        <div class="card-header">
            系统配置
        </div>
        <div class="card-body">
              <x-input name="title" title="系统标题" value="{{config('admin.title')}}"></x-input>
              <x-input name="logo" theme="image" title="系统Logo" image="{{config('admin.logo')}}" action="{{route('admin.config.upload')}}"></x-input>
              <x-input name="copyright" theme="textarea" title="版权信息">{{config('admin.copyright')}}</x-input>
        </div>
        <div class="card-footer text-muted">
            <button class="btn btn-primary btn-sm">保存</button>
        </div>
    </div>
    </form>
@endsection
