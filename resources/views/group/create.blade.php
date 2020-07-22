@extends('layouts.admin')
@section('content')
    @include('group.nav')
    <form action="{{route('admin.group.store')}}" method="post">
        @csrf
        <div class="card mt-3">
            <div class="card-header">
                用户组资料
            </div>
            <div class="card-body">
                <div class="col-12 col-sm-6">
                    <x-input title="用户组名称" name="title" required></x-input>
                    <x-input title="站点数量" name="site_nums" required></x-input>
                    <x-input title="可用天数" name="days" required></x-input>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                可选套餐
            </div>
            @foreach($packages as $package)
                {{$package->title}}<br>

            @endforeach
            <div class="card-body">
                <module-select></module-select>
            </div>
        </div>
        <button class="btn btn-primary mt-3">保存</button>
    </form>
@endsection
@push('js')
    <script>
        window.packages = @json($packages)
    </script>
@endpush
