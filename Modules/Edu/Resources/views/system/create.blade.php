@extends('layouts.module')

@section('content')

@include('edu::system.nav')

<form action="{{ route('edu.admin.system.store') }}" method="post">

    @csrf
    @include('edu::system.form')
</form>
@endsection
