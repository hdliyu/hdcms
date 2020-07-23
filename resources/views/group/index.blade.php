@extends('layouts.admin')
@section('content')
    @include('group.nav')
    <table class="table table-bordered mt-3 shadow">
        <thead>
        <tr>
            <th width="80">编号</th>
            <th width="300">组名称</th>
            <th>应用套餐</th>
            <th>可用模块</th>
            <th width="180">操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($groups as $group)
            <tr>
                <td scope="row">{{$group->id}}</td>
                <td>{{$group->title}}</td>
                <td>
                    @foreach($group->packages as $package)
                        <a href="{{route('admin.package.edit',$package)}}" class="badge badge-info mr-2">{{$package->title}}</a>
                    @endforeach
                </td>
                <td>
                    @foreach($group->modules as $module)
                        <a href="{{route('admin.module.index')}}" class="badge badge-info mr-2">{{$module->title}}</a>
                    @endforeach
                </td>
                <td>
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{route('admin.group.edit',$group)}}" class="btn btn-info">编辑</a>
                        @if($group['id']>1)
                            <btn-del action="{{route('admin.group.destroy',$group)}}"></btn-del>
                        @endif
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
