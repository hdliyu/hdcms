<div class="card">
    <div class="card-header">
        访问令牌
    </div>
    <div class="card-body">
        <x-input title="regionId" name="aliyun[regionId]" value="{{ config('site.aliyun.regionId') }}"
            value="{{ config('site.aliyun.regionId','cn-hangzhou') }}"
            placeholder="根据服务器所在区域进行选择 | https://help.aliyun.com/document_detail/40654.html?spm=5176.7114037.1996646101.1.OCtdEo">
        </x-input>

        <x-input type="text" title="accessKeyId" name="aliyun[accessKeyId]"
            value="{{ config('site.aliyun.accessKeyId') }}"
            placeholder="如果使用主账号访问，登陆阿里云 AccessKey 管理页面创建、查看 | 如果使用子账号访问，请登录阿里云访问控制控制台查看"></x-input>

        <x-input type="text" title="accessKeySecret" name="aliyun[accessKeySecret]"
            value="{{ config('site.aliyun.accessKeySecret') }}"
            placeholder="如果使用主账号访问，登陆阿里云 AccessKey 管理页面创建、查看 | 如果使用子账号访问，请登录阿里云访问控制控制台查看"></x-input>


    </div>
</div>

<div class="card mt-3">
    <div class="card-header">
        OSS
    </div>
    <div class="card-body">
        <x-input title="endpoint" name="aliyun[oss][endpoint]"
            value="{{ config('site.aliyun.oss.endpoint','https://oss-cn-qingdao.aliyuncs.com') }}"
            placeholder="在阿里云后台中oss数据块中查看外网访问的EndPoint">
        </x-input>

        <x-input title="bucket" name="aliyun[oss][bucket]" value="{{ config('site.aliyun.oss.bucket') }}"></x-input>

    </div>
</div>
