@extends('layouts.module')
@section('content')
    @include('edu::lesson.nav')
    <form action="{{ route('edu.admin.lesson.update',$lesson) }}" method="post">
        @csrf
        @method("PUT")
        @include('edu::lesson.form')
    </form>
@endsection
