@inject('permissionService','App\Services\PermissionService')
@extends('layouts.admin')
@section('content')
    @include('site_module.nav')
    <div class="row">
        @foreach ($site->master->group->modules as $module)
                @if($permissionService->checkModuleAccess($site,$module['name']))
                <div class="col-12 col-sm-2">
                    <div class="card shadow-sm">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                            <img src=" {{ $module->preview }}" class="rounded-circle mb-3" style="width: 55px;">
                            <h6> {{ $module->title }}</h6>
                            <span class="text-secondary small text-center">
                    {{ $module->description }}
                </span>
                        </div>
                        <div class="card-footer text-muted text-center">
                            <a href="{{ route('site.module.entry',[$site,$module['name']]) }}" class="btn btn-info btn-sm">管理模块</a>
                        </div>
                    </div>
                </div>
                @endif
        @endforeach
    </div>
@endsection
