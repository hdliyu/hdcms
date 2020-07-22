@extends('layouts.admin')
@section('content')
    @include('package.nav')
    <table class="table table-bordered mt-3 shadow">
        <thead>
        <tr>
            <th width="80">编号</th>
            <th width="300">套餐名称</th>
            <th>用户组</th>
            <th>包含模块</th>
            <th width="180">操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($packages as $package)
            <tr>
                <td scope="row">{{$package->id}}</td>
                <td>{{$package->title}}</td>
                <td>{{$package->id}}</td>
                <td>
                    @foreach($package->modules as $module)
                        <span class="badge badge-success">{{$module->title}}</span>
                    @endforeach
                </td>
                <td>
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{route('admin.package.edit',$package)}}" class="btn btn-info">编辑</a>
                        @if($package['id']>1)
                            <btn-del action="{{route('admin.package.destroy',$package)}}"></btn-del>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
