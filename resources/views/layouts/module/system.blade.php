@extends('layouts.module.master')
@section('scripts')
@stack('vue')
<script src="{{ mix('/js/app.js') }}"></script>
@stack('scripts')
@endsection
