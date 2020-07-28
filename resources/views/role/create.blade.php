@extends('layouts.admin')
@section('content')
    @include('role.nav')
    <form action="{{route('site.role.store',$site)}}" method="post">
        @csrf
        @include('role.form')
    </form>
@endsection
