<div class="card rounded shadow-sm mb-2">
    <div class="card-header bg-white border-0 p-1 d-flex justify-content-center auto-height">
        <a href="" class="mt-3 d-flex flex-column align-items-center">
            <img src="{{$user['avatar']}}" class="rounded-circle border" style="width:150px;height:150px;">
            <span class="text-secondary mt-2">{{$user['name']}}</span>
        </a>
    </div>
    <div class="card-body text-center text-secondary ">
        <i aria-hidden="true" class="fa fa-home mr-1 text-info"></i>
        <i aria-hidden="true" class="fa fa-envelope mr-1 text-info"></i>
        <i aria-hidden="true" class="fab fa-weibo mr-1 text-info"></i>
        <i aria-hidden="true" class="fab fa-weixin mr-1 text-info"></i>
        <i aria-hidden="true" class="fab fa-github mr-1 text-info"></i>
        <i aria-hidden="true" class="fab fa-qq mr-1 text-info"></i>
    </div>
    <div class="text-center pb-3">
        <a href="{{ route('user.follower',$user) }}" class="btn btn-sm
        {{ user()->isFollower($user)?'btn-info':'btn-outline-info' }}">
            <i class="fa fa-plus"></i>
            {{ user()->isFollower($user)?'已关注':'关注 TA' }}
        </a>
        <a href="{{ route('common.favour',['User',$user->id]) }}"
           class="btn btn-sm {{ $user->make()->isFavour?'btn-success':'btn-outline-secondary' }}" `">
        <i class="fas fa-heart "></i>
        {{ $user->make()->isFavour?'感谢点赞': '点个赞呗'}}
        </a>
    </div>
</div>
