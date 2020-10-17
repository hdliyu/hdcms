<div class="card mt-3">
    <div class="card-header">
        公众号资料
    </div>
    <div class="card-body">
        <x-input title="公众号名称" name="title" value="{{ $wechat['title']??'' }}"></x-input>
        <x-input title="TOKEN" name="token" value="{{ $wechat['token']??'' }}"></x-input>
        <x-input theme="textarea" title="公众号介绍" name="introduce">{{ $wechat['title']??'' }}</x-input>
        <x-input title="微信号" name="name" value="{{ $wechat['name']??'' }}"></x-input>
        <x-input theme="image" title="二维码" name="qr" value="{{ $wechat['qr']??'' }}"></x-input>
        <x-input theme="radio" title="公众号类型" name="type" :options="['subscribe'=>'订阅号','service'=>'服务号']"
                value="{{ $wechat['type']??'subscribe' }}">
        </x-input>
        <x-input title="原始ID" name="wechat_id" value="{{ $wechat['wechat_id']??'' }}"></x-input>

        <div class="form-group">
            <label>appID</label>
            <input type="text" class="form-control @error( 'appID' )is-invalid @enderror" name="appID"
                   value="{{ old('appID',$wechat['appID']??'') }}" {{ $wechat['appID']?'readonly':'' }}>
            @error( 'appID' )
            <strong class="invalid-feedback">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label>appsecret</label>
            <input type="text" class="form-control @error( 'appsecret' )is-invalid @enderror" name="appsecret"
                   value="{{ old('appsecret',$wechat['appsecret'])??'' }}" {{ $wechat['appsecret']?'readonly':'' }}>
            @error( 'appsecret' )
            <strong class="invalid-feedback">{{ $message }}</strong>
            @enderror
        </div>
    </div>
</div>

<button class="btn btn-primary mt-3">保存</button>
