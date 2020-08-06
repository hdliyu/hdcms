<div class="d-flex pt-3 pb-3 border-bottom align-items-center mb-2">
    <a href="" class="">
        <span class="mr-3">
            <img src="{{ $topic->user->avatar}}" class="avatar45 rounded">
        </span>
    </a>
    <div class="d-flex flex-column justify-content-between">
        <a href="{{ route('edu.front.topic.show',$topic) }}" class="text-secondary h5">
            {{ $topic['title'] }}
        </a>
        <div class="small text-black-50">
            <a href="https://www.houdunren.com/edu/space/27210/topic">
                {{ $topic->user->name??'' }}
            </a>
            . 更新于 {{ $topic->updated_at->diffForHumans() }}
            <span>. 评论 {{ $topic->comment_count }}</span>

        </div>
    </div>
</div>
