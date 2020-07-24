@extends('layouts.admin')
@section('content')
    <div>
        <a href="{{route('admin.site.create')}}" class="btn btn-info mb-3"><i class="fa fa-plus" aria-hidden="true"></i>
            添加网站</a>
        @foreach($sites as $site)
            <div class="card mb-3 shadow-sm">
                <div class="card-header d-flex justify-content-between">
                    <div>套餐：
                        @foreach($site->master->group->packages as $package)
                            <span class="badge badge-info mr-2">{{$package['title']}}</span>
                        @endforeach
                    </div>
                    <div>
                        <i class="fa fa-cog" aria-hidden="true"></i> 应用扩展
                    </div>
                </div>
                <div class="card-body">
                    <i class="fa fa-rss fa-3x mr-3" aria-hidden="true"></i>
                    <span class="h3">{{$site['title']}}</span>
                </div>
                <div class="card-footer text-muted d-flex flex-column flex-sm-row justify-content-between">
                    <div class="small mb-2">
                        创建时间: {{$site['created_at']}} 站长: {{$site->master->name}} 所属组: {{$site->master->group->title}}
                    </div>
                    <div class="small">
                        <a href="https://www.houdunren.com" target="_blank" class="text-muted mr-2"><i
                                aria-hidden="true"
                                class="fa fa-home"></i>
                            访问首页
                        </a> <a href="" class="text-muted mr-2"><i class="fa fa-life-ring"></i>
                            更新缓存
                        </a> <a href="/site/1/config" class="text-muted mr-2"><i aria-hidden="true"
                                                                                 class="fa fa-check-circle-o"></i>
                            网站配置
                        </a> <a href="" class="text-muted mr-2"><i class="fa fa-comment-o"></i>
                            微信公众号
                        </a> <a href="/site/1/user" class="text-muted mr-2"><i class="fa fa-user-o"></i>
                            用户列表
                        </a> <a href="/site/1/admin" class="text-muted mr-2"><i class="fa fa-user-circle-o"></i>
                            操作员设置
                        </a> <a href="/site/1/edit" class="text-muted mr-2"><i class="fa fa-pencil-square-o"></i>
                            编辑
                        </a> <a href="" class="text-muted"><i class="fa fa-trash"></i>
                            删除
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
