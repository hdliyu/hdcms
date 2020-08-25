@extends('edu::layouts.member')

@section('content')
<div id="app" class="card shadow-sm">
    <div class="card-header bg-white">
        贴子列表
    </div>
    <div class="card-body ">
        <table class="table ">
            <thead>
                <tr>
                    <th>编号</th>
                    <th>标题</th>
                    <th>发布时间</th>
                    <th width="120"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($topics as $topic)
                <tr>
                    <td>
                        {{ $topic['id'] }}
                    </td>
                    <td>
                        {{ $topic['title'] }}
                    </td>
                    <td>
                        {{ $topic['created_at'] }}
                    </td>
                    <td>
                        <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                            <a href="{{ route('edu.front.topic.edit',$topic) }}" class="btn btn-info">编辑</a>
                            <btn-del action="{{ route('edu.front.topic.destroy',$topic) }}" class="btn btn-secondary">
                                删除
                            </btn-del>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$topics->links()}}
    </div>
</div>
@endsection
