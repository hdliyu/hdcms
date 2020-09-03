@extends('edu::layouts.front')
@push('vue')
    <script src="https://cdn.bootcdn.net/ajax/libs/hls.js/8.0.0-beta.3/hls.min.js"></script>
    <script>
        let video = document.getElementById('video');
        let videoSrc = '{{ config('module.play.hls') }}';
        if (Hls.isSupported()) {
            let hls = new Hls();
            hls.loadSource(videoSrc);
            hls.attachMedia(video);
            hls.on(Hls.Events.MANIFEST_PARSED, function() {
                video.play();
            });
        }
        else if (video.canPlayType('application/vnd.apple.mpegurl')) {
            video.src = videoSrc;
            video.addEventListener('loadedmetadata', function() {
                video.play();
            });
        }
    </script>
@endpush
@section('content')
     @if (config('module.is_live'))
    <div>
        <div style="background:#22262f">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-8">
                        <video id="video" width="100%" controls></video>
                    </div>
                    <div class="col-12 col-sm-4 d-flex pl-sm-0" id="app">

                    </div>
                </div>
            </div>
        </div>
    </div>
     @endif
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

{{--                        <x-input name="c" title="播流RTMP地址" value="{{ config('module.play.rtmp') }}"></x-input>--}}
{{--                        <x-input name="c" title="播流FLV地址" value="{{ config('module.play.flv') }}"></x-input>--}}
{{--                        <x-input name="c" title="播流M3U8地址" value="{{ config('module.play.hls') }}"></x-input>--}}

                        <a href="{{route('edu.front.live.push')}}" class="btn btn-primary mt-3">推流</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
