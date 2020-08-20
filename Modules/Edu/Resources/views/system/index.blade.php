@extends('layouts.module')

@section('content')

@include('edu::system.nav')

<table class="table mt-3 table-bordered">
    <thead>
        <tr>
            <th>编号</th>
            <th>课程名称</th>
            <th>课程介绍</th>
            <th>作者</th>
            <th>课程数量</th>
            <th>发布时间</th>
            <th width="160"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($systems as $system)
        <tr>
            <td>{{ $system['id'] }}</td>
            <td>{{ $system['title'] }}</td>
            <td>{{ $system['description'] }}</td>
            <td>{{ $system->user->name }}</td>
            <td></td>
            <td>{{ $system['created_at'] }}</td>
            <td>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <a href="{{ route("edu.admin.system.edit",$system) }}" class="btn btn-info">编辑</a>
                    <a href="#" class="btn btn-success">查看</a>
                    <btn-del action="{{ route('edu.admin.system.destroy',$system) }}" class="btn btn-secondary">
                    </btn-del>1
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
