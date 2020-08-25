@extends('edu::layouts.member')

@section('content')
<div id="app" class="card shadow-sm">
    <div class="card-header bg-white">
        站内消息
    </div>
    <div class="card-body ">
        @if ($notifications->count()>0)
        <table class="table ">
            <thead>
                <tr>
                    <th>消息</th>
                    <th>发布时间</th>
                    <th width="120"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($notifications as $notification)
                <tr>
                    <td>
                        {{ $notification['data']['title'] }}
                    </td>
                    <td>
                        {{ $notification['created_at'] }}
                    </td>
                    <td>
                        <div role="group" aria-label="Basic example" class="btn-group btn-group-sm">
                            <a href="{{ route('edu.member.message.show',$notification['id']) }}"
                                class="btn btn-info">查看</a>
                            <btn-del action="{{ route('edu.member.message.destroy',$notification['id']) }}" class="btn
                            btn-secondary">
                                删除
                            </btn-del>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @else
        <strong class="d-block text-center p-3 text-secondary font-weight-normal">
            <i class="fas fa-info-circle"></i> 暂无任何消息
        </strong>
        @endif

    </div>

    @include('edu::layouts.paginate',['data'=>$notifications])
</div>
@endsection
