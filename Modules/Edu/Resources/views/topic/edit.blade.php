@extends('edu::layouts.front')

@section('content')
<form action="{{ route('edu.front.topic.update',$topic) }}" method="post">
    @csrf
    @method('PUT')
    @include('edu::topic.form')
</form>
@endsection
