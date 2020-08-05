@extends('layouts.module')
@section('content')
    @include('edu::subscribe.nav')
    <form action="{{route('edu.admin.subscribe.update',$subscribe)}}" method="post">
        @csrf
        @method('PUT')
        @include('edu::subscribe.form')
    </form>
@endsection
