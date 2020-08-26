@extends('edu::layouts.front')
@section('content')
    {{-- 视频播放--}}
    <div class="video mb-2">
        <div class="container p-0 pl-md-3 pr-md-3">
            <div class="video">
                <video controls>
                    {{--                        <source src="{{ $video->path }}" type="video/mp4">--}}
                </video>
            </div>
        </div>
    </div>
    {{-- 视频播放END--}}
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-info" role="alert">
                    <i class="fas fa-info-circle"></i>
                    {{ config('module.live.notice') }}
                </div>
            </div>
        </div>
    </div>
    @if (is_admin())
        <div class="container mt-3 mb-5">
            <div class="row">
                <div class="col-12">
                    <div class="bg-white p-3 border shadow-sm">
                        <div class="alert alert-secondary" role="alert">
                            请在10分钟内使用
                        </div>
                        <x-input name="a" title="推流服务器" value="{{ config('module.push.url') }}"></x-input>
                        <x-input name="a" title="串流密钥" value="{{ config('module.push.key') }}"></x-input>

                        {{-- <x-input name="c" title="播流RTMP地址" value="{{ config('module.play.rtmp') }}"></x-input>
                        <x-input name="c" title="播流FLV地址" value="{{ config('module.play.flv') }}"></x-input>
                        <x-input name="c" title="播流M3U8地址" value="{{ config('module.play.hls') }}"></x-input> --}}

                        <a href="" class="btn btn-primary mt-3">推流</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
