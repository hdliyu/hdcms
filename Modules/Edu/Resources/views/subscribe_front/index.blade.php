@extends('edu::layouts.front')
@section('content')
    <div class="subscribe">
        <div class="header">
            <h1 class="text-white text-center">投资学习会得到加倍的回报</h1>
            <h2>订阅会员免费观看网站所有视频</h2>
        </div>
        <div id="app" class="container items">
            <div class="row">
                @foreach($subscribes as $subscribe)
                <div class="col-12 col-md-4 mt-3">
                    <div class="card shadow-lg item">
                        <div class="card-body text-center pb-4 pt-5 shadow"><i class="fa-6x text-primary fab {{$subscribe['icon']}}"></i>
                            <div class="mt-2 mb-2"><span class="price">{{$subscribe['price']}}</span> <small class="text-secondary">元</small></div>
                            <div class="title font-weight-bold text-secondary">{{$subscribe['title']}}</div>
                        </div>
                        <div class="card-footer text-muted text-center pb-5 pt-4 shadow"><h5 class="text-center mb-3 mt-2">{{$subscribe['ad']}}</h5>
                            <div role="group" aria-label="Basic example" class="btn-group"><a target="_blank" href="https://www.houdunren.com/edu/pay/subscribe/alipay/1" class="btn btn-success btn-sm">支付宝付款(推荐)</a>
                                <button type="button" data-toggle="modal" data-target="#exampleModal1" class="btn btn-outline-info btn-sm ">
                                    微信支付
                                </button>
                                <div id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body"><img data-url="https://www.houdunren.com/edu/pay/subscribe/wepay/1"> <span class="d-block">使用微信扫描二维码进行支付</span>
                                                <div role="group" class="btn-group mt-2">
                                                    <button type="button" onclick="changeQr('exampleModal1')" class="btn btn-outline-success btn-sm">刷新二维码</button>
                                                    <a href="https://www.houdunren.com/edu/member/duration" class="btn btn-info btn-sm">完成付款</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="container text-secondary instruct text-center">
            <a href="https://www.houdunren.com/edu/member/duration" class="mb-3 btn btn-sm btn-info shadow-sm">
                <i class="fas fa-info-circle"></i> 支付成功后无法跳转请点击这里
            </a>

            <p> 视频属于虚拟物品，购买后不支持退款</p>

            <p>
                支付的费用仅用于观看视频，并不包含其他服务（如在线解答），有问题发到网站我们会尽量帮助解决。
                祝你学有所成，加油！
            </p>
        </div>
    </div>
@endsection
