@extends('layouts.admin')
@section('content')
    @include('group.nav')
    <form action="{{route('admin.group.store')}}" method="post">
        @csrf
        @include('group.form')
    </form>
@endsection
@push('scripts')
    <script>
        window.packages = @json($packages)
    </script>
@endpush
