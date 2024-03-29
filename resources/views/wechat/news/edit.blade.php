@extends('layouts.module.system')

@section('content')
@include('wechat.news.nav')

<div class="alert alert-info" role="alert">
    <i class="fas fa-info-circle"></i> 由于微信被动图文消息调整，目前只允许发送单个图文消息
</div>

<form action="{{ route('wechat.news.update',$news) }}" method="post">
    @csrf
    @method("PUT")
    <wechat-rule :rid="{{ $news->rule_id }}"></wechat-rule>
    <wechat-news class="mt-3" :id="{{ $news->rule->news->id }}"></wechat-news>
    <button class="btn btn-primary mt-3">保存提交</button>
</form>
@endsection
