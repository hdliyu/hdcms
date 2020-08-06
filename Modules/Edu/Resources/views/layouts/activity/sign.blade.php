<div class="d-flex pt-3 pb-3 border-bottom align-items-center mb-2">
    <a href="{{ route('edu.center.topic.index',  $activity->subject->user) }}">
        <span class="mr-3 ">
            <img src=" {{ $activity->causer->icon }}" class="avatar45 rounded">
        </span>
    </a>
    <div class="d-flex flex-column justify-content-between">
        <a href="{{ $activity->subject->link }}" class="text-secondary h5">
            {{ $activity->subject->content }}
        </a>
        <div class="small text-black-50">
            <span class="badge badge-success">每日签到</span>
            <a href="{{ route('edu.center.topic.index',  $activity->subject->user) }}">
                {{ $activity->causer->name }}
            </a>
            . 发表于 {{ $activity->subject->created_at->diffForHumans() }}
        </div>
    </div>
</div>
