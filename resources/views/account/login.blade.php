@extends('layouts.account')
@section('title','会员登录')
@section('content')
    <div class="card shadow">
        <form action="{{route('login.store')}}" method="post">
            @csrf
            <div class="card-header">
                会员登录
            </div>
            <div class="card-body">
                <x-input title="账号" type="text" name="account" placeholder="请输入邮箱或手机号"></x-input>
                <x-input title="密码" type="password" name="password" placeholder="请输入登录密码"></x-input>
                <x-input component="captcha"></x-input>
                <label for="remember"><input type="checkbox" name="remember"> 记住我</label>
            </div>
            <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                <button class="btn btn-success">登录</button>
                <div>
                    <a href="{{route('register.index')}}">注册</a> | <a href="">找回密码</a>
                </div>
            </div>
        </form>
    </div>
@endsection
