@extends('layouts.admin')
@section('content')
    <nav class="nav nav-tabs nav-stacked">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fa fa-home" aria-hidden="true"></i>
        </a>
        <a class="nav-link active" href="#">编辑站点</a>
    </nav>
    <form action="{{ route('admin.site.update') }}" method="post">
        @csrf
        @method('PUT')
        @include('site.form')
    </form>
@endsection
