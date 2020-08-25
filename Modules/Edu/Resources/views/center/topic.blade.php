@extends('edu::layouts.center')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-white">
        TA的贴子
    </div>
    <div class="card-body ">
        @foreach ($topics as $topic)
        <div class="d-flex pt-3 pb-3 border-bottom align-items-center mb-2">
            <a href="{{ route('edu.front.topic.show',$topic) }}" class="">
                <span class="mr-3">
                    <img src="{{ $user->icon }}" class="avatar45 rounded">
                </span>
            </a>
            <div class="d-flex flex-column justify-content-between">
                <a href="{{ route('edu.front.topic.show',$topic) }}" class="text-secondary h5">
                    {{ $topic['title'] }}
                </a>
                <div class="small text-black-50">
                    更新于 {{ $topic['created_at'] }}
                    <span>. 评论 {{ $topic->comment_count }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="card-footer">
        @include('edu::layouts.paginate',['data'=>$topics])
    </div>
</div>

@endsection
