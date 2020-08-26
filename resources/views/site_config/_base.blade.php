<div class="card">
    <div class="card-header">
        基本信息
    </div>
    <div class="card-body col-6">
        <x-input title="关键词" name="base[keywords]" value="{{ config('site.base.keywords') }}"></x-input>

        <x-input title="网站描述" name="base[description]" value="{{ config('site.base.description') }}"></x-input>

        <x-input title="ICP备案号" name="base[icp]" value="{{ config('site.base.icp') }}"></x-input>

        <x-input title="电话" name="base[tel]" value="{{ config('site.base.tel') }}"></x-input>

        <x-input title="邮箱" name="base[email]" value="{{ config('site.base.email') }}"></x-input>

        <x-input theme="textarea" title="统计代码" name="base[copyright]">{{ config('site.base.copyright') }}</x-input>

    </div>
</div>
