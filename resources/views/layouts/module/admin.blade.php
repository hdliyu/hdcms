@extends('layouts.module.master')

@section('scripts')

@stack('vue')
<script src="/modules/{{ module()['name'] }}/app.js"></script>
<script src="/admin2/js/sb-admin-2.min.js"></script>
@stack('scripts')

@endsection
