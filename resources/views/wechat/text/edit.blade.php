@extends('layouts.module.system')

@section('content')
@include('wechat.text.nav')

<form action="{{ route('wechat.text.update',$text) }}" method="post">
    @csrf
    @method('PUT')

    <chat-rule :rid="{{ $text->rule_id }}"></chat-rule>

    <chat-text class="mt-3" :id="{{ $text->id }}"></chat-text>

    <button class="btn btn-primary mt-3">保存提交</button>
</form>
@endsection
