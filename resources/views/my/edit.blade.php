@extends('layouts.admin')
@section('content')
    <nav class="nav nav-tabs nav-stacked">
        <a class="nav-link" href="{{ route('admin.setting') }}">
            <i class="fa fa-home" aria-hidden="true"></i>
        </a>
        <a class="nav-link active" href="#">我的资料</a>
    </nav>
    <form action="{{ route('admin.my.update') }}" method="post">
        @csrf
        @method("PUT")
        <div class="card mt-3">
            <div class="card-header">
                基本资料
            </div>
            <div class="card-body">
                <div class="col-12 col-sm-6">
                    <x-input title="昵称" name="name" required value="{{ user('name') }}"></x-input>
                    <x-input title="邮箱" name="email" value="{{ user('email') }}"></x-input>
                    <x-input title="QQ号码" name="qq" value="{{ user('qq') }}"></x-input>
                    <x-input title="手机号" name="mobile" value="{{ user('mobile') }}"></x-input>
                    <x-input title="github" name="github" value="{{ user('github') }}"></x-input>
                    <x-input title="微博" name="weibo" value="{{ user('weibo') }}"></x-input>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                密码
            </div>
            <div class="card-body">
                <div class="col-12 col-sm-6">
                    <x-input type="password" title="密码" name="password"></x-input>
                    <x-input type="password" title="确认密码" name="password_confirmation"></x-input>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button class="btn btn-primary btn-sm">保存</button>
            </div>
        </div>
    </form>
@endsection
