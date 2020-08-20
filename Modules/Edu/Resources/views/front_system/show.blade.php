@extends('edu::layouts.front')
@section('content')
    <div class="container mt-5 border shadow-sm p-5 bg-white">
        <h4 class="text-secondary mb-3">{{$system['title']}}</h4>
        <div class="bg-light p-3 text-secondary">
            {{$system['description']}}
        </div>
    </div>
    <div class="container bg-white border shadow-sm p-5 mt-2 mb-5">
        <h5 class="text-secondary mb-3">课程列表</h5>
        @foreach($system->lessons as $lesson)
            <div class="border-top pt-3 pb-2 mb-2 d-flex justify-content-between text-secondary">
                <a href="{{route('edu.front.lesson.show',$lesson)}}" class="">{{$lesson['title']}}</a>
                <div class="small text-secondary">
                    <i aria-hidden="true" class="fa fa-video-camera"></i>
                    共有{{$lesson['video_num']}} 个视频
                </div>
            </div>
        @endforeach
    </div>
@endsection
