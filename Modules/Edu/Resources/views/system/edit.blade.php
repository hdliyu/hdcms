@extends('layouts.module')

@section('content')

@include('edu::system.nav')

<form action="{{ route('edu.admin.system.update',$system) }}" method="post">
    @csrf
    @method('PUT')
    @include('edu::system.form')
</form>
@endsection

@push('scripts')
<script>
    window.lessons = @json($system->lessons);
</script>
@endpush
