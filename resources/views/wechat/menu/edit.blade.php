@extends('layouts.admin')
@section('content')
    @include('wechat.nav')
    <wechat-menu site_id="{{$site->id}}" wechat_id="{{$wechat->id}}"></wechat-menu>
@endsection
