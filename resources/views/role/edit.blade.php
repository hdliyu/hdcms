@extends('layouts.admin')
@section('content')
    @include('role.nav')
    <form action="{{route('site.role.update',[$site,$role])}}" method="post">
        @csrf
        @method('PUT')
        @include('role.form')
    </form>
@endsection
