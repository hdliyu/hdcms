@extends('edu::layouts.front')
@section('content')
    <div class="container mt-3 mb-5">
        <div class="row">
            <div class="col-12 col-md-9 mb-3">
                <div class="bg-white rounded shadow-sm border border-gary shadow-sm p-md-5 p-3">
                    <div class="border-bottom mb-5 pb-3">
                        <h5 class="pb-1 pt-3 mb-3 text-monospace text-black-50">
                            {{$topic['title']}}
                        </h5>
                        <div class="small text-secondary clearfix">
                            <div class="float-left pt-2">
                                <a href="/edu/center/topic/18907" class="text-success">{{$topic->user->name}}</a>
                                {{$topic->created_at->diffForHumans()}}
                                <span class="pr-2 pl-2">/</span>
                                {{$topic['favour_count']}}
                                <span class="pr-2 pl-2">/</span>
                                更新于{{$topic->updated_at->diffForHumans()}}
                                <span class="pr-2 pl-2">/</span>
                                收藏数{{$topic['favorite_count']}}
                                <span class="pr-2 pl-2">/</span>
                                点赞数{{$topic['favour_count']}}
                            </div>
                            <div class="float-right">
                                <div class="btn-group btn-group-sm">
                                    @if (is_admin())
                                        <a href="" class="btn btn-outline-info">
                                            推荐
                                        </a>
                                    @endif
                                    @can('update',$topic)
                                        <a href="{{ route('edu.front.topic.edit',$topic) }}"
                                           class="btn btn-outline-success">编辑</a>
                                    @endcan
                                </div>
                                <div class="btn-group btn-group-sm align-items-center">
                                    <a href="{{ route('common.favorite',['Topic',$topic['id']]) }}" class="btn {{ $topic->isFavorite?'btn-info':'btn-outline-secondary' }}">
                                        <i aria-hidden="true" class="fa fa-heart-o"></i> 收藏
                                    </a>
                                    <button type="button" class="btn btn-outline-secondary">
                                        {{ $topic->favorite_count }}
                                    </button>
                                    @can('update',$topic)
                                        <form action="{{ route('edu.front.topic.destroy',$topic) }}" method="post" class="d-inline-block ml-1">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-outline-secondary" onclick="return confirm('确定删除吗')">
                                                删除
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="topic-content markdown bg-white text-monospace">
                        {!! $topic['html'] !!}
                    </div>

                    <div>
                        <div class="mt-5 text-center border-top border-gary pt-5">
                            <div role="group" aria-label="First group" class="favour btn-group mr-2">
                                <a href="{{route('common.favour',['Topic',$topic['id']])}}" class="btn {{$topic['isfavour']?'btn-success':'btn-outline-secondary
'}}">
                                    <i class="fa fa-thumbs-o-up"></i> 点个赞呗
                                </a>
                                <button type="button" class="btn btn-outline-info">
                                    感谢 {{$topic['favour_count']}}位朋友的喜欢
                                </button>
                            </div>
                        </div>
                        <div class="favour-list text-center pt-3 w-75 m-auto">
                            @foreach($topic->favours as $user)
                               <img src="{{$user['avatar']}}" class="rounded-circle avatar35">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div id="app" class="mt-3">
                    <comment model="Topic" id="{{$topic['id']}}"></comment>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="card rounded shadow-sm mb-2">
                    <div class="card-header bg-white border-0 p-1 d-flex justify-content-center auto-height">
                        <a href="https://www.houdunren.com/edu/space/1/topic" class="mt-3 d-flex flex-column align-items-center">
                            <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/11552521685.png" class="rounded-circle border" style="width:150px;height:150px;">
                            <span class="text-secondary mt-2">向军老师</span>
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
                        <a href="https://www.houdunren.com/common/follower/1" data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" data-original-title="" title="" class="btn btn-sm btn-success">
                            <i class="fa fa-plus"></i>
                            关注 TA
                        </a>
                        <a href="https://www.houdunren.com/common/favour/User/1" data-container="body" data-toggle="popover" data-placement="top" data-trigger="hover" data-content="收到 0 个赞" data-original-title="" title="" class="btn btn-sm btn-outline-info">
                            <i class="fas fa-heart "></i>
                            点个赞呗
                        </a>
                    </div>
                </div>
                <div class="card rounded shadow-sm mb-2">
                    @include('edu::topic.tips')
                </div>
            </div>
        </div>
    </div>
@endsection
