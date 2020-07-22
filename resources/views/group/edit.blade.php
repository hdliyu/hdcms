@extends('layouts.admin')
@section('content')
    @include('group.nav')
    <form action="{{route('admin.group.update',$group)}}" method="post">
        @csrf
        @method('PUT')
        @include('group.form')
    </form>
@endsection
@push('js')
    <script>
        window.packages = @json($packages)
    </script>
@endpush
