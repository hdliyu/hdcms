@extends('layouts.module')
@section('content')
    @include('edu::lesson.nav')
    <form action="{{ route('edu.admin.lesson.store') }}" method="post">
        @csrf
        @include('edu::lesson.form')
    </form>
@endsection
