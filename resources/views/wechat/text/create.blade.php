@extends('layouts.module.system')

@section('content')
@include('wechat.text.nav')

<form action="{{ route('wechat.text.store') }}" method="post">
    @csrf

    <wechat-rule></wechat-rule>

    <wechat-text class="mt-3"></wechat-text>

    <button class="btn btn-primary mt-3">保存提交</button>
</form>
@endsection
