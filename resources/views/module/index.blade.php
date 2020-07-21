@extends('layouts.admin')
@section('content')
    @include('module.nav')
    <div class="card mt-3">
        <div class="card-header">
            已安装模块列表
        </div>
        <div class="card-body">
            @foreach ($modules as $module)
                <section class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                    <img src="/modules/{{ $module['name'] }}/static/preview.jpg" alt="" style="width:45px;"
                         class="rounded mr-3">

                    <div class="flex-fill">
                        <strong>{{ $module['title'] }}</strong> {{ $module['description'] }} <br>
                        标识: {{ $module['name'] }} 版本号: {{ $module['version'] }}
                    </div>
                    <div>
                        @if($module['installed'])
                            <btn-del title="卸载" action="{{ route('admin.module.uninstall',$module['name']) }}"></btn-del>
                        @else
                            <a href="{{ route('admin.module.install',$module['name']) }}" class="btn btn-info btn-sm">安装</a>
                        @endif
                    </div>
                </section>

            @endforeach
        </div>
    </div>
@endsection
