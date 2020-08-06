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
                                更新于{{$topic->updated_at->diffForHumans()}}前
                                <span class="pr-2 pl-2">/</span>
                                收藏数{{$topic['favorite_count']}}
                                <span class="pr-2 pl-2">/</span>
                                点赞数{{$topic['favour_count']}}
                            </div>
                            <div class="float-right">
                                <div class="btn-group btn-group-sm">

                                </div>
                                <div class="btn-group btn-group-sm align-items-center">
                                    <a href="https://www.houdunren.com/common/favorite/topic/1814/Edu" type="button" class="btn btn-outline-secondary">
                                        <i aria-hidden="true" class="fa fa-heart-o"></i> 收藏
                                    </a>

                                    <button type="button" class="btn btn-outline-secondary">
                                        1
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="topic-content markdown bg-white text-monospace markdown">
                    </div>

                    <div wire:id="K8CuydtC6E1QGHE3hNBW">
                        <div class="mt-5 text-center border-top border-gary pt-5">
                            <div role="group" aria-label="First group" class="favour btn-group mr-2" wire:click="$emit('change')">
                                <button type="button" class="btn btn-success">
                                    <i class="fa fa-thumbs-o-up"></i> 点个赞呗
                                </button>

                                <button type="button" class="btn btn-outline-info">
                                    感谢 49位朋友的喜欢
                                </button>
                            </div>

                        </div>


                        <div class="favour-list text-center pt-3 w-75 m-auto">
                            <a href="https://www.houdunren.com/edu/space/25807/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/258071574998930.png" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/591/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/7014dc2af47af16cf2a4adc8ed3b820c1542534872.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/14781/fans" class="m-1 d-inline-block">
                                <img src="/attachments/2020/06/15923572511592357251.6453.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/1861/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/18611552610420.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/20078/fans" class="m-1 d-inline-block">
                                <img src="/attachments/2020/05/15894459081589445908.2042.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/8525/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/bcb0a9356e9596fad74f42bbcea55d351548607017.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/31545/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/315451587649971.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/32028/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/320281588728443.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/25238/fans" class="m-1 d-inline-block">
                                <img src="/attachments/2020/06/15909729631590972963.1985.gif" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/22181/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/221811559547390.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/27210/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/272101579696174.png" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/32245/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/322451589208894.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/8535/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/85351553356512.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/29731/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/297311584609016.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/27378/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/273781580363655.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/20196/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/201961552551123.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/1377/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/13771552958498.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/32751/fans" class="m-1 d-inline-block">
                                <img src="https://www.houdunren.com/images/avatar.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/30856/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/308561586430884.png" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/16106/fans" class="m-1 d-inline-block">
                                <img src="/attachments/2020/06/15910740391591074039.5991.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/17718/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/177181554954932.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/32877/fans" class="m-1 d-inline-block">
                                <img src="/attachments/2020/06/15911901641591190164.8121.png" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/29436/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/294361584103783.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/24706/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/247061571102597.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/32926/fans" class="m-1 d-inline-block">
                                <img src="https://www.houdunren.com/images/avatar.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/26400/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/264001577434833.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/32867/fans" class="m-1 d-inline-block">
                                <img src="https://www.houdunren.com/images/avatar.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/32738/fans" class="m-1 d-inline-block">
                                <img src="https://www.houdunren.com/images/avatar.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/33116/fans" class="m-1 d-inline-block">
                                <img src="/attachments/2020/06/15921827581592182758.9317.png" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/30759/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/307591587368555.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/26399/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/263991586190624.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/33391/fans" class="m-1 d-inline-block">
                                <img src="/attachments/2020/06/15931391001593139100.0386.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/32389/fans" class="m-1 d-inline-block">
                                <img src="https://www.houdunren.com/images/avatar.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/33492/fans" class="m-1 d-inline-block">
                                <img src="/attachments/2020/06/15934816021593481602.0966.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/28355/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/283551582247473.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/28307/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/283071582162642.jpeg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/18907/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/189071569680848.png" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/33457/fans" class="m-1 d-inline-block">
                                <img src="/attachments/2020/07/15948668251594866825.6225.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/33817/fans" class="m-1 d-inline-block">
                                <img src="https://www.houdunren.com/images/avatar.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/26926/fans" class="m-1 d-inline-block">
                                <img src="https://www.houdunren.com/images/avatar.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/23983/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/239831568336263.jpeg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/34028/fans" class="m-1 d-inline-block">
                                <img src="https://www.houdunren.com/images/avatar.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/33906/fans" class="m-1 d-inline-block">
                                <img src="https://www.houdunren.com/images/avatar.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/28381/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/283811582294734.jpg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/564/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/d15174f71ef08d919bbd55fc099789d11544673451.png" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/1230/fans" class="m-1 d-inline-block">
                                <img src="https://houdunren-image.oss-cn-qingdao.aliyuncs.com/12301553915823.png" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/32860/fans" class="m-1 d-inline-block">
                                <img src="/attachments/2020/06/15911957181591195718.0707.jpeg" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/33051/fans" class="m-1 d-inline-block">
                                <img src="/attachments/2020/06/15918892711591889271.1895.png" class="rounded-circle avatar35">
                            </a>
                            <a href="https://www.houdunren.com/edu/space/34247/fans" class="m-1 d-inline-block">
                                <img src="https://www.houdunren.com/images/avatar.jpg" class="rounded-circle avatar35">
                            </a>
                        </div>
                    </div>
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
                    <div class="card-header bg-white text-muted">
                        <i aria-hidden="true" class="fa fa-check-circle-o mr-1"></i>
                        社区小贴
                    </div>
                    <div class="card-body font-weight-light">后盾人是一个主张友好、分享、自由的技术交流社区。</div>
                    <div class="card-footer text-muted bg-white text-center">
                        <div class="d-flex justify-content-between">
                            <a href="{{route('edu.front.topic.create')}}" class="btn btn-outline-success btn-sm flex-fill">
                                <i class="fa fa-pencil-square-o"></i> 发贴交流
                            </a>
                            <a href="https://www.houdunren.com/Edu/sign" class="btn btn-outline-danger btn-sm flex-fill ml-2">
                                <i aria-hidden="true" class="fa fa-flag"></i>
                                签到打卡
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
