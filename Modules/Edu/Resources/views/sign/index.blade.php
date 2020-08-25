@extends('edu::layouts.front')

@section('content')
    @auth
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-header bg-white">签到快乐，再接再厉</div>

                @if (user()->make()->isSign)
                    <div class="card-body h6 font-weight-normal" style="line-height: 1.5rem;">
                        您上次签到时间:
                        <span class="text-danger">
                {{ user()->make()->sign->created_at }}
            </span>
                        <br>
                        您的总签到天数:
                        <span class="text-danger">
                {{ user()->make()->signTotal}}
            </span>
                        天 <br>
                        您本月签到天数:: <span class="text-danger">
                {{ user()->make()->monthSign}}
            </span> 天
                    </div>

                @else
                    <form action="{{ route("edu.front.sign.store") }}" method="post">
                        @csrf
                        <div class="card-body h6 font-weight-normal">
                            <input type="text" name="content" value=""
                                   class="form-control form-control-lg @error( 'content' )is-invalid @enderror"
                                   placeholder=" 你今天的心情或最想说的话">
                            @error( 'content' )
                            <strong class="invalid-feedback">{{ $message }}</strong>
                            @enderror

                            <div class="mood mt-3 ">
                                <label>
                                    <input type="radio" hidden="" name="mood" value="ch">
                                    <img src="/modules/Edu/static/sign/ch.gif" class="">
                                </label>
                                <label>
                                    <input type="radio" hidden="" name="mood" value="fd">
                                    <img src="/modules/Edu/static/sign/fd.gif" class="">
                                </label>
                                <label>
                                    <input type="radio" hidden="" name="mood" value="kx">
                                    <img src="/modules/Edu/static/sign/kx.gif" class="">
                                </label>
                                <label>
                                    <input type="radio" hidden="" name="mood" value="ng">
                                    <img src="/modules/Edu/static/sign/ng.gif" class="">
                                </label>
                                <label>
                                    <input type="radio" hidden="" name="mood" value="nu">
                                    <img src="/modules/Edu/static/sign/nu.gif" class="">
                                </label>
                                <label>
                                    <input type="radio" hidden="" name="mood" value="shuai">
                                    <img src="/modules/Edu/static/sign/shuai.gif" class="">
                                </label>
                                <label>
                                    <input type="radio" hidden="" name="mood" value="wl">
                                    <img src="/modules/Edu/static/sign/wl.gif" class="">
                                </label>
                                <label>
                                    <input type="radio" hidden="" name="mood" value="yl">
                                    <img src="/modules/Edu/static/sign/yl.gif" class="">
                                </label>
                                <label>
                                    <input type="radio" hidden="" name="mood" value="ym">
                                    <img src="/modules/Edu/static/sign/ym.gif" class="">
                                </label>
                            </div>
                            @error('mood')
                            <strong class="text-danger small font-weight-bold">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="card-footer text-muted">
                            <button type="submit" class="btn btn-success">开始签到</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    @endauth


    <div id="app" class="container sign-list mb-5">
        <div class="card mt-3 shadow-sm ">
            <div class="card-header bg-white">今日签到排行</div>
            <div class="card-body">
                <table class="table table-bordered text-secondary">
                    <thead>
                    <tr>
                        <th>会员</th>
                        <th>今日签到时间</th>
                        <th>总签到天数</th>
                        <th>月签到天数</th>
                        <th>签到心情</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($signs as $sign)
                        <tr class="sign">
                            <td width="150" class="align-middle">
                                <a href="https://www.houdunren.com/edu/space/8525/topic">
                                    <img src="{{$sign->user->icon}}" class="w35 rounded mr-2 align-middle">
                                    {{$sign->user->name}}
                                </a></td>
                            <td width="120" class="align-middle">
                                {{ $sign->created_at->diffForHumans() }}
                            </td>
                            <td width="120" class="align-middle">
                                @php
                                    // dump($sign->toArray());
                                @endphp
                                {{ $sign->signTotal->total }}
                            </td>
                            <td width="120" class="align-middle">
                                {{ $sign->signTotal->month }}
                            </td>
                            <td class="align-middle">
                                <img src="/modules/Edu/static/sign/{{ $sign->mood }}.gif" class="w35">
                                {{ $sign->content }}
                                @can('delete',$sign)
                                    <btn-del action="{{ route('edu.front.sign.destroy',$sign) }}" class="small text-muted">
                                        <i class="fas fa-times-circle"></i>
                                        删除
                                    </btn-del>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
