<?php

namespace App\Services;

use App\Models\ModuleConfig;

class ConfigService
{
    public function loadSiteConfig()
    {
        config(['site' => site()['config']]);
        //微信登录
        config(['services.weixinweb' => [
            'client_id' => config('site.user.wechatweb_client_id'),
            'client_secret' => config('site.user.wechatweb_client_secret'),
            'redirect' => route('login.wechat.callback')
        ]]);
    }

    public function saveCurrentModuleConfig(array $config)
    {
        $model = ModuleConfig::firstOrNew(['site_id' => site()['id'], 'module_id' => module()['id']]);
        $model->config = array_merge($model->config??[], $config);
        $model->save();
    }

    public function loadCurrentModuleConfig()
    {
        $model = ModuleConfig::where('site_id', site()['id'])->where('module_id', module()['id'])->first();
        config(['module' => $model['config'] ?? []]);
    }
}
