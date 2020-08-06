@extends('edu::layouts.front')

@section('content')
<div class="container mt-3 mt-md-5 mb-5">
    <div class="row">
        <div class="col-12 col-sm-9 mt-2">
            <div class="card">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    社区动态
                    <a href="{{ route('edu.front.topic.create') }}" class="btn btn-outline-secondary btn-sm">发表</a>
                </div>
                <div class="card-body">
                    @foreach ($activities as $activity)
                        @include('edu::layouts.activity.'.$activity['log_name'])
                    @endforeach
                    <div class="pt-3">
                        @include('edu::layouts.paginate',['data'=>$activities])
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-3 mt-2 pl-0">
            <div class="card rounded shadow-sm mb-2">
                <div class="card-header bg-white text-muted">
                    <i aria-hidden="true" class="fa fa-check-circle-o mr-1"></i>
                    社区小贴
                </div>
                <div class="card-body font-weight-light">后盾人是一个主张友好、分享、自由的技术交流社区。</div>
                <div class="card-footer text-muted bg-white text-center">
                    <div class="d-flex justify-content-between">
                        <a href="https://www.houdunren.com/Edu/topic/create"
                            class="btn btn-outline-success btn-sm flex-fill">
                            <i class="fa fa-pencil-square-o"></i> 发贴交流
                        </a>
                        <a href="https://www.houdunren.com/Edu/sign"
                            class="btn btn-outline-danger btn-sm flex-fill ml-2">
                            <i aria-hidden="true" class="fa fa-flag"></i>
                            签到打卡
                        </a>
                    </div>
                </div>
            </div>
            <div class="card rounded shadow-sm mb-2">
                <div class="card-header bg-white text-muted">
                    <i aria-hidden="true" class="fa fa-check-circle-o mr-1"></i>
                    学习动态
                </div>
                <div class="list-group list-group-flush">

                    <div class="list-group-item">
                        <div class="d-flex align-items-start justify-content-start">
                            <div class="pt-1 mr-3">
                                <a href="https://www.houdunren.com/edu/space/33448/topic">
                                    <img src="https://www.houdunren.com/images/avatar.jpg" class="avatar35 rounded">
                                </a>
                            </div>
                            <div class="pl-0">
                                <a href="https://www.houdunren.com/Edu/video/9297"
                                    class="d-flex justify-content-between d-block mb-1">
                                    58 iOS UIPageControl
                                </a>
                                <div class="small text-black-50">
                                    <a href="https://www.houdunren.com/edu/space/33448/topic">
                                        Simonyer
                                    </a>
                                    <i class="fa fa-clock-o"></i>
                                    3分钟前
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex align-items-start justify-content-start">
                            <div class="pt-1 mr-3">
                                <a href="https://www.houdunren.com/edu/space/34008/topic">
                                    <img src="https://www.houdunren.com/images/avatar.jpg" class="avatar35 rounded">
                                </a>
                            </div>
                            <div class="pl-0">
                                <a href="https://www.houdunren.com/Edu/video/13355"
                                    class="d-flex justify-content-between d-block mb-1">
                                    5 ajax异步请求任务管理
                                </a>
                                <div class="small text-black-50">
                                    <a href="https://www.houdunren.com/edu/space/34008/topic">
                                        踩着石头过河
                                    </a>
                                    <i class="fa fa-clock-o"></i>
                                    8分钟前
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex align-items-start justify-content-start">
                            <div class="pt-1 mr-3">
                                <a href="https://www.houdunren.com/edu/space/33116/topic">
                                    <img src="/attachments/2020/06/15921827581592182758.9317.png"
                                        class="avatar35 rounded">
                                </a>
                            </div>
                            <div class="pl-0">
                                <a href="https://www.houdunren.com/Edu/video/13189"
                                    class="d-flex justify-content-between d-block mb-1">
                                    19 原来数据也可以使用构造函数构建
                                </a>
                                <div class="small text-black-50">
                                    <a href="https://www.houdunren.com/edu/space/33116/topic">
                                        guiguix22
                                    </a>
                                    <i class="fa fa-clock-o"></i>
                                    17分钟前
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex align-items-start justify-content-start">
                            <div class="pt-1 mr-3">
                                <a href="https://www.houdunren.com/edu/space/33448/topic">
                                    <img src="https://www.houdunren.com/images/avatar.jpg" class="avatar35 rounded">
                                </a>
                            </div>
                            <div class="pl-0">
                                <a href="https://www.houdunren.com/Edu/video/9296"
                                    class="d-flex justify-content-between d-block mb-1">
                                    57 iOS ScrollView的常用属性
                                </a>
                                <div class="small text-black-50">
                                    <a href="https://www.houdunren.com/edu/space/33448/topic">
                                        Simonyer
                                    </a>
                                    <i class="fa fa-clock-o"></i>
                                    18分钟前
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex align-items-start justify-content-start">
                            <div class="pt-1 mr-3">
                                <a href="https://www.houdunren.com/edu/space/34007/topic">
                                    <img src="https://www.houdunren.com/images/avatar.jpg" class="avatar35 rounded">
                                </a>
                            </div>
                            <div class="pl-0">
                                <a href="https://www.houdunren.com/Edu/video/12326"
                                    class="d-flex justify-content-between d-block mb-1">
                                    13 掌握变量作用域知识
                                </a>
                                <div class="small text-black-50">
                                    <a href="https://www.houdunren.com/edu/space/34007/topic">

                                    </a>
                                    <i class="fa fa-clock-o"></i>
                                    20分钟前
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex align-items-start justify-content-start">
                            <div class="pt-1 mr-3">
                                <a href="https://www.houdunren.com/edu/space/33116/topic">
                                    <img src="/attachments/2020/06/15921827581592182758.9317.png"
                                        class="avatar35 rounded">
                                </a>
                            </div>
                            <div class="pl-0">
                                <a href="https://www.houdunren.com/Edu/video/13188"
                                    class="d-flex justify-content-between d-block mb-1">
                                    18 构造函数创建对象的方式
                                </a>
                                <div class="small text-black-50">
                                    <a href="https://www.houdunren.com/edu/space/33116/topic">
                                        guiguix22
                                    </a>
                                    <i class="fa fa-clock-o"></i>
                                    20分钟前
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex align-items-start justify-content-start">
                            <div class="pt-1 mr-3">
                                <a href="https://www.houdunren.com/edu/space/33863/topic">
                                    <img src="https://www.houdunren.com/images/avatar.jpg" class="avatar35 rounded">
                                </a>
                            </div>
                            <div class="pl-0">
                                <a href="https://www.houdunren.com/Edu/video/12461"
                                    class="d-flex justify-content-between d-block mb-1">
                                    3 Kitematic图型化docker管理
                                </a>
                                <div class="small text-black-50">
                                    <a href="https://www.houdunren.com/edu/space/33863/topic">
                                        Roger_J
                                    </a>
                                    <i class="fa fa-clock-o"></i>
                                    21分钟前
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex align-items-start justify-content-start">
                            <div class="pt-1 mr-3">
                                <a href="https://www.houdunren.com/edu/space/33863/topic">
                                    <img src="https://www.houdunren.com/images/avatar.jpg" class="avatar35 rounded">
                                </a>
                            </div>
                            <div class="pl-0">
                                <a href="https://www.houdunren.com/Edu/video/12460"
                                    class="d-flex justify-content-between d-block mb-1">
                                    2 配置docker加速器增加下载速度
                                </a>
                                <div class="small text-black-50">
                                    <a href="https://www.houdunren.com/edu/space/33863/topic">
                                        Roger_J
                                    </a>
                                    <i class="fa fa-clock-o"></i>
                                    22分钟前
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex align-items-start justify-content-start">
                            <div class="pt-1 mr-3">
                                <a href="https://www.houdunren.com/edu/space/33863/topic">
                                    <img src="https://www.houdunren.com/images/avatar.jpg" class="avatar35 rounded">
                                </a>
                            </div>
                            <div class="pl-0">
                                <a href="https://www.houdunren.com/Edu/video/12459"
                                    class="d-flex justify-content-between d-block mb-1">
                                    1 安装Docker Desktop 与 Docker Toolbox
                                </a>
                                <div class="small text-black-50">
                                    <a href="https://www.houdunren.com/edu/space/33863/topic">
                                        Roger_J
                                    </a>
                                    <i class="fa fa-clock-o"></i>
                                    24分钟前
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex align-items-start justify-content-start">
                            <div class="pt-1 mr-3">
                                <a href="https://www.houdunren.com/edu/space/33448/topic">
                                    <img src="https://www.houdunren.com/images/avatar.jpg" class="avatar35 rounded">
                                </a>
                            </div>
                            <div class="pl-0">
                                <a href="https://www.houdunren.com/Edu/video/9295"
                                    class="d-flex justify-content-between d-block mb-1">
                                    56 iOS ScrollView图片浏览
                                </a>
                                <div class="small text-black-50">
                                    <a href="https://www.houdunren.com/edu/space/33448/topic">
                                        Simonyer
                                    </a>
                                    <i class="fa fa-clock-o"></i>
                                    31分钟前
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex align-items-start justify-content-start">
                            <div class="pt-1 mr-3">
                                <a href="https://www.houdunren.com/edu/space/31302/topic">
                                    <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/313021587197695.jpg"
                                        class="avatar35 rounded">
                                </a>
                            </div>
                            <div class="pl-0">
                                <a href="https://www.houdunren.com/Edu/video/12797"
                                    class="d-flex justify-content-between d-block mb-1">
                                    3 背景重复与尺寸定制
                                </a>
                                <div class="small text-black-50">
                                    <a href="https://www.houdunren.com/edu/space/31302/topic">
                                        w;_0105
                                    </a>
                                    <i class="fa fa-clock-o"></i>
                                    31分钟前
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex align-items-start justify-content-start">
                            <div class="pt-1 mr-3">
                                <a href="https://www.houdunren.com/edu/space/33724/topic">
                                    <img src="https://www.houdunren.com/images/avatar.jpg" class="avatar35 rounded">
                                </a>
                            </div>
                            <div class="pl-0">
                                <a href="https://www.houdunren.com/Edu/video/11638"
                                    class="d-flex justify-content-between d-block mb-1">
                                    11.thinkphp5.1之模板渲染 view()方法
                                </a>
                                <div class="small text-black-50">
                                    <a href="https://www.houdunren.com/edu/space/33724/topic">
                                        fetone
                                    </a>
                                    <i class="fa fa-clock-o"></i>
                                    33分钟前
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex align-items-start justify-content-start">
                            <div class="pt-1 mr-3">
                                <a href="https://www.houdunren.com/edu/space/31302/topic">
                                    <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/313021587197695.jpg"
                                        class="avatar35 rounded">
                                </a>
                            </div>
                            <div class="pl-0">
                                <a href="https://www.houdunren.com/Edu/video/12796"
                                    class="d-flex justify-content-between d-block mb-1">
                                    2 背景重复与滚动技巧
                                </a>
                                <div class="small text-black-50">
                                    <a href="https://www.houdunren.com/edu/space/31302/topic">
                                        w;_0105
                                    </a>
                                    <i class="fa fa-clock-o"></i>
                                    39分钟前
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex align-items-start justify-content-start">
                            <div class="pt-1 mr-3">
                                <a href="https://www.houdunren.com/edu/space/33979/topic">
                                    <img src="https://www.houdunren.com/images/avatar.jpg" class="avatar35 rounded">
                                </a>
                            </div>
                            <div class="pl-0">
                                <a href="https://www.houdunren.com/Edu/video/9209"
                                    class="d-flex justify-content-between d-block mb-1">
                                    5 向军老师Vue开发宝典-v-text与v-html的使用
                                </a>
                                <div class="small text-black-50">
                                    <a href="https://www.houdunren.com/edu/space/33979/topic">

                                    </a>
                                    <i class="fa fa-clock-o"></i>
                                    42分钟前
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item">
                        <div class="d-flex align-items-start justify-content-start">
                            <div class="pt-1 mr-3">
                                <a href="https://www.houdunren.com/edu/space/33724/topic">
                                    <img src="https://www.houdunren.com/images/avatar.jpg" class="avatar35 rounded">
                                </a>
                            </div>
                            <div class="pl-0">
                                <a href="https://www.houdunren.com/Edu/video/11637"
                                    class="d-flex justify-content-between d-block mb-1">
                                    10.thinkphp5.1之路由参数
                                </a>
                                <div class="small text-black-50">
                                    <a href="https://www.houdunren.com/edu/space/33724/topic">
                                        fetone
                                    </a>
                                    <i class="fa fa-clock-o"></i>
                                    43分钟前
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
