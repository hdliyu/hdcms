<?php

namespace App\Services;

use App\Models\Module as Model;
use App\Models\Site;

class ModuleService
{

    public function allInstall()
    {
        return $this->all()->filter(function($item){
            return $item['installed'];
        });
    }
    public function all()
    {
        $modules = \Module::toCollection();
        return $modules->map(function($module){
            return $this->find($module->getName());
        });
    }

    public function find(string $name)
    {
        $module = \Module::find($name);
        $config = $this->config($module, 'config');
        $model = Model::where('name', $name)->first();
        return $config + [
                'preview' => '/modules/' . $name . '/static/preview.jpg',
                'id' => $model['id'] ?? 0,
                'menus' => $this->config($module, 'menus'),
                'installed' => (bool) $model,
                'module' => $module
            ];
    }

    protected function config($module, $name)
    {
        return include $module->getPath() . '/Config/' . $name . '.php';
    }

    public function getSiteModules(Site $site)
    {
        return $site->master->group->modules->map(function ($module) {
            return $this->find($module['name']);
        });
    }

}
