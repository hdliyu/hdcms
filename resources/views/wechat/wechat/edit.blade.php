@extends('layouts.admin')
@section('content')
@include('wechat.nav')
<form action="{{route('wechat.wechat.store',$site)}}" method="post">
    @csrf
    @method('PUT')
    @include('wechat.wechat._form')
</form>
@endsection
