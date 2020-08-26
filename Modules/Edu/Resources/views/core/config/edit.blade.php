<div class="card">
    <div class="card-header">
        直播配置
    </div>
    <div class="card-body">
        <x-input theme="textarea" name="live[notice]" title="直播通知">{{ config('module.live.notice') }}</x-input>
        <x-input theme="textarea" name="live[other]" title="第三方直播地址">{{ config('module.live.other') }}</x-input>
    </div>
</div>
<div class="card mt-3">
    <div class="card-header">
        模块配置
    </div>
    <div class="card-body">
        <x-input name="live[push_url]" title="推流地址" value="{{ config('module.live.push_url') }}"></x-input>
        <x-input name="live[push_key]" title="推流URL鉴权KEY" value="{{ config('module.live.push_key') }}"></x-input>

        <x-input name="live[play_url]" title="播流地址" value="{{ config('module.live.play_url') }}"></x-input>
        <x-input name="live[play_key]" title="播流URL鉴权KEY" value="{{ config('module.live.play_key') }}"></x-input>
    </div>
</div>
