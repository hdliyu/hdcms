@extends('layouts.admin')
@section('content')
    <nav class="nav nav-tabs nav-stacked">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fa fa-home" aria-hidden="true"></i>
        </a>
        <a class="nav-link active" href="#">添加站点</a>
    </nav>
    <form action="{{ route('admin.site.store') }}" method="post">
        @csrf
        @include('site.form')
    </form>
@endsection
