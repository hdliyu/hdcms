@extends('layouts.admin')
@section('content')
@include('wechat.nav')
<form action="{{ route('wechat.default.update',[$site,$wechat]) }}" method="post">
    @csrf
    @method("PUT")
    <div class="card mt-3">
        <div class="card-header">
            默认消息
        </div>
        <div class="card-body">
            <x-input theme="textarea" title="关注欢迎消息（支持微信关键词）" name="welcome">{{ $wechat->welcome }}</x-input>
            <x-input theme="textarea" title="默认回复消息（支持微信关键词）" name="default_message">{{ $wechat->default_message }}
            </x-input>
        </div>
    </div>
    <button class="btn btn-primary mt-3">保存</button>
</form>
@endsection
