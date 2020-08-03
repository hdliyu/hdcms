@extends('layouts.module')
@section('content')
    @include('edu::lesson.nav')
    <table class="table mt-3 table-bordered">
        <thead>
        <tr>
            <th>编号</th>
            <th>课程名称</th>
            <th>上架</th>
            <th>标签</th>
            <th>点赞数</th>
            <th>收藏数</th>
            <th>视频数量</th>
            <th>发布时间</th>
            <th width="160"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($lessons as $lesson)
            <tr>
                <td>{{ $lesson['id'] }}</td>
                <td>{{ $lesson['title'] }}</td>
                <td>
                    @foreach ($lesson->tags as $tag)
                        <span class="badge badge-info mr-2">{{ $tag['title'] }}</span>
                    @endforeach
                </td>
                <td>
                    @if ($lesson['status'])
                        <i class="fas fa-check    "></i>
                    @endif
                </td>
                <td>{{ $lesson['favour_num'] }}</td>
                <td>{{ $lesson['favorite_num'] }}</td>
                <td>{{ $lesson['video_num'] }}</td>
                <td>{{ $lesson['created_at'] }}</td>
                <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                        <a href="{{ route("edu.admin.lesson.edit",$lesson) }}" class="btn btn-info">编辑</a>
                        <a href="#" class="btn btn-success">查看</a>
                        <btn-del action="{{ route('edu.admin.lesson.destroy',$lesson) }}"></btn-del>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ $lessons->links() }}
    </div>
@endsection
