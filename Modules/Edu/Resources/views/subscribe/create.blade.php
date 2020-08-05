@extends('layouts.module')
@section('content')
    @include('edu::subscribe.nav')
    <form action="{{route('edu.admin.subscribe.store')}}" method="post">
        @csrf
        @include('edu::subscribe.form')
    </form>
@endsection
