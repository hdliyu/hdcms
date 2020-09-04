<div class="header shadow-sm bg-light">
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light bg-light pt-3 pb-3 pl-md-0 pr-md-0">
            <a href="/" class="navbar-brand text-muted font-weight-bold router-link-exact-active router-link-active">
                <i aria-hidden="true" class="fas fa-code text-info font-weight-bolder"></i>
                houdunren
            </a>
            <button type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                    aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"
                    class="navbar-toggler d-lg-none">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="collapsibleNavId" class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0 font-weight-bold">
                    <li class="nav-item pr-2">
                        <a href="{{ route('edu.front.system.index') }}" class="nav-link">系统学习</a>
                    </li>
                    <li class="nav-item pr-2">
                        <a href="{{ route("edu.front.lesson.index") }}" class="nav-link">实战课程</a>
                    </li>
                    <li class="nav-item pr-2">
                        <a href="{{ route('edu.front.video.index') }}" class="nav-link">最近更新</a>
                    </li>
                    <li class="nav-item pr-2">
                        <a href="{{ route("edu.front.topic.index") }}" class="nav-link">话题讨论</a>
                    </li>
                    <li class="nav-item pr-2">
                        <a href="{{ route('edu.front.sign.index') }}" class="nav-link">签到打卡</a>
                    </li>
                    <li class="nav-item pr-2">
                        <a href="{{ route('edu.front.subscribe.index') }}" class="nav-link">订阅会员</a>
                    </li>
                    <li class="nav-item pr-2">
                        <a href="{{ route('edu.front.live.index') }}" class="nav-link">直播间</a>
                    </li>
                </ul>
                @guest
                    <div class="form-inline mr-3">
                        <a href="/login" class="btn btn-info mr-1 btn-sm">登录</a>
                        <a href="/register" class="btn btn-outline-info btn-sm">注册</a>
                    </div>
                @endguest
                @auth
                    <div class="form-inline my-lg-0" style="position: relative;top:5px;">
                        <a href="{{ route('edu.member.message.index') }}" class="small">
                            <i class="far fa-envelope" style="font-size:20px;"></i>
                            <span class="badge badge-info rounded" style="position: relative;top:-10px;left:-6px;">
                            {{ user()->unreadNotifications()->count() }}
                        </span>
                        </a>
                    </div>
                    <div class="form-inline my-2 my-lg-0">
                        <div class="nav-item pr-2 dropdown">
                            <a href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                               class="nav-link dropdown-toggle d-flex align-items-center text-secondary">
                            <span class="mr-2 avatar25" style="line-height: 25px; font-size: 18px;">
                                <img src="{{ user('avatar') }}" class="rounded" style="width:25px;height: 25px;">
                            </span>
                                {{ user('name') }}
                            </a>
                            <div aria-labelledby="dropdownId" class="dropdown-menu">
                                <a href="https://www.houdunren.com/member/base" class="dropdown-item mb-2 mt-2">修改资料</a>
                                <a href="" class="dropdown-item mb-2">头像设置</a>
                                <a href="https://www.houdunren.com/member/password" class="dropdown-item mb-2">修改密码</a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('edu.member.topic.index') }}" class="dropdown-item mb-2">我的贴子</a>
                                <a href="https://www.houdunren.com/edu/member/duration" class="dropdown-item mb-2">会员周期</a>
                                <a href="{{ route('edu.member.message.index') }}" class="dropdown-item mb-2">站内消息</a>

                                <div class="dropdown-divider"></div>
                                <a href="{{ route('edu.center.topic.index',user()) }}" class="dropdown-item mb-2">我的主页</a>
                                <div class="dropdown-divider"></div>
                                <a href="/logout" class="dropdown-item mb-2">退出登录</a>
                            </div>
                        </div>
                    </div>
                @endauth

            </div>
        </nav>
    </div>
</div>
