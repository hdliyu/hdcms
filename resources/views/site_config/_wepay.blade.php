<div class="card">
    <div class="card-header">
        微信支付
    </div>
    <div class="card-body">
        <x-input type="password" title="微信支付商户号" name="wepay[mch_id]" value="{{ config('site.wepay.mch_id') }}"
            placeholder="公众号支付请求中用于加密的密钥Key">
        </x-input>

        <x-input type="password" title="商户支付API密钥" name="wepay[key]" value="{{ config('site.wepay.key') }}"
            placeholder="请在 微信支付-安全中心-API安全 中设置或查看">
        </x-input>

        <x-input title="运行模式" name="alipay[mode]" placeholder="沙箱模式需要设置值为dev" value="{{ config('site.alipay.mode') }}">
        </x-input>
    </div>
</div>

<div class="card mt-3">
    <div class="card-header">
        应用APPID
    </div>
    <div class="card-body">
        <x-input type="password" title="公众号APPID" name="wepay[app_id]" value="{{ config('site.wepay.app_id') }}"
            placeholder="公众号 APPID">
        </x-input>
    </div>
</div>
