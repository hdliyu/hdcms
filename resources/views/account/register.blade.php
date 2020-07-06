@extends('layouts.account')
@section('title','会员注册')
@section('content')
    <register inline-template>
    <div class="card shadow">
        <form action="{{route('register.store')}}" method="post">
            @csrf
        <div class="card-header">
            会员注册
        </div>
        <div class="card-body">
                <div>
                    <x-input title="账号" type="text" name="account" placeholder="请输入邮箱或手机号" v-model="form.account"></x-input>
                    <div class="form-group">
                        <label for="code">验证码</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="请输入收到的验证码" id="code" v-model="form.code">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2" style="cursor: pointer;" @click="sendCode">发送验证码</span>
                            </div>
                        </div>
                    </div>
                    <x-input component="captcha" v-model="form.captch"></x-input>
                </div>
            <hr>
            <x-input title="密码" type="password" name="password" placeholder="请输入注册密码" v-model="form.password"></x-input>
            <x-input title="确认密码" type="password" name="password_confirmation" placeholder="请输入确认密码" v-model="form.password_confirmation"></x-input>
        </div>
        <div class="card-footer text-muted d-flex justify-content-between align-items-center">
            <button class="btn btn-success">注册</button>
            <div>
                <a href="{{route('login.index')}}">登录</a> | <a href="">找回密码</a>
            </div>
        </div>
        </form>
    </div>
    </register>
@endsection
