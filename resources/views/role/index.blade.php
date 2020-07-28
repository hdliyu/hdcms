@extends('layouts.admin')
@section('content')
    @include('role.nav')
    <table class="table table-bordered mt-3 shadow">
        <thead>
        <tr>
            <th width="80">编号</th>
            <th width="300">角色名称</th>
            <th width="80">操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($site->roles as $role)
            <tr>
                <td scope="row">{{$role['id']}}</td>
                <td>{{$role['title']}}</td>
                <td>
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{route('site.role.edit',[$site,$role])}}" class="btn btn-info">编辑</a>
                        <a href="{{ route('site.permission.edit',[$site,$role]) }}" class="btn btn-primary">设置权限</a>
                         <btn-del action="{{route('site.role.destroy',[$site,$role])}}"></btn-del>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
