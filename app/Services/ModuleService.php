<?php

namespace App\Services;

use App\Models\Module as Model;

class ModuleService
{
    public function all()
    {
        $modules = \Module::toCollection();
        return $modules->map(function($module){
            return $this->find($module->getName());
        });
    }

    public function find($name)
    {
        $module = \Module::find($name);
        $config = include $module->getPath().'/Config/config.php';
        return $config+[
                'installed'=>Model::where('name',$name)->exists(),
                'module'=>$module,
            ];
    }

}
