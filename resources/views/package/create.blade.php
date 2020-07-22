@extends('layouts.admin')
@section('content')
    @include('package.nav')
    <form action="{{route('admin.package.store')}}" method="post">
        @csrf
        <div class="card mt-3">
            <div class="card-header">
                套餐资料
            </div>
            <div class="card-body">
                <x-input title="套餐名称" name="title" required class="col-12 col-md-6"></x-input>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                可选模块
            </div>
            <div class="card-body">
                <module-select></module-select>
            </div>
        </div>
        <button class="btn btn-primary mt-3">保存</button>
    </form>
@endsection
@push('js')
    <script>
        window.modules = @json($modules)
    </script>
@endpush
