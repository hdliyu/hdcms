<div class="card rounded shadow-sm mb-2">
    <div class="card-header bg-white text-muted">
        <i aria-hidden="true" class="fa fa-check-circle-o mr-1"></i>
        学习动态
    </div>
    <div class="list-group list-group-flush">
        @foreach($studys as $study)
        <div class="list-group-item">
            <div class="d-flex align-items-start justify-content-start">
                <div class="pt-1 mr-3">
                    <a href="{{route('edu.center.topic.index',$study->user)}}">
                        <img src="{{$study->user->avatar}}" class="avatar35 rounded">
                    </a>
                </div>
                <div class="pl-0">
                    <a href="{{route('edu.front.video.show',$study->video)}}"
                       class="d-flex justify-content-between d-block mb-1">
                        {{$study->video->title}}
                    </a>
                    <div class="small text-black-50">
                        <a href="{{route('edu.center.topic.index',$study->user)}}">
                            {{$study->user->name}}
                        </a>
                        <i class="fa fa-clock-o"></i>
                        {{$study->created_at->diffForHumans()}}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
