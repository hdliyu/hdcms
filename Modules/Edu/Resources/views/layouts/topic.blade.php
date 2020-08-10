<div class="d-flex pt-3 pb-3 border-bottom align-items-center justify-content-between mb-2">
    <div class="d-flex">
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
    <div>
            @can('update',$topic)
                <a href="{{ route('edu.front.topic.edit',$topic) }}"
                   class="btn btn-sm btn-outline-success">编辑</a>
            <form action="{{ route('edu.front.topic.destroy',$topic) }}" method="post"
                  class="d-inline-block">
                @csrf
                @method('delete')
                <button class="btn btn-sm btn-outline-danger" onclick="return confirm('确定删除吗')">
                    删除
                </button>
            </form>
           @endcan
    </div>
</div>
