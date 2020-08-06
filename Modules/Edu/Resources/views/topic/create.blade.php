@extends('edu::layouts.front')

@section('content')
<form action="{{ route('edu.front.topic.store') }}" method="post">
    @csrf
    @include('edu::topic.form')
</form>
@endsection
