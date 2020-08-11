@extends('edu::layouts.front')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12 col-md-9 mb-3">
                <div class="card">
                    <div class="card-body p-5">
                        <h4 class="text-black-50 mb-4">{{$lesson['title']}}</h4>
                        <div role="group" aria-label="" class="btn-group btn-group-sm">
                            <a href="https://www.houdunren.com/common/favorite/Lesson/339/Edu" class="btn btn-outline-secondary">
                                <i aria-hidden="true" class="fa fa-heart-o"></i> 收藏
                            </a>
                            <button type="button" class="btn  btn-outline-secondary">{{$lesson['favorite_count']}}</button>
                        </div>
                        <div role="group" aria-label="" class="btn-group btn-group-sm">
                            <a href="https://www.houdunren.com/common/favour/Lesson/339/Edu" class="btn btn-outline-secondary">
                                <i aria-hidden="true" class="fa fa-thumbs-o-up"></i> 点赞
                            </a>
                            <button type="button" class="btn btn-outline-secondary">{{$lesson['favour_count']}}</button>
                        </div>

                        <ul class="list-group list-group-flush mt-5">
                            @foreach($lesson->videos as $video)
                            <li class="list-group-item pl-0 mb-1 pb-3">
                                <a href="{{route('edu.front.video.show',$video)}}" class="text-muted">{{$video['title']}}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
              @include('edu::topic.tips')
            </div>
        </div>
    </div>
@endsection
