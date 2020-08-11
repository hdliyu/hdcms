@extends('edu::layouts.front')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-12 col-md-9 mb-3">
                <div class="card">
                    <div class="card-header bg-white">最近更新</div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach($videos as $video)
                            <li class="list-group-item pl-0 d-flex justify-content-between">
                                <a href="{{route('edu.front.video.show',$video)}}">{{$video['title']}}</a>
                                <span class="small text-secondary">{{$video['updated_at']->diffForHumans()}}</span>
                            </li>
                            @endforeach
                        </ul>
                        <div class="mt-2">
                          @include('edu::layouts.paginate',['data'=>$videos])
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 pl-md-0">
               @include('edu::topic.tips')
            </div>
        </div>
    </div>
@endsection
