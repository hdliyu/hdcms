<?php

namespace App\Services;

use App\Models\Module as Model;

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

    public function find($name)
    {
        $module = \Module::find($name);
        $config = include $module->getPath().'/Config/config.php';
        $module = Model::where('name',$name)->first();
        return $config+[
                'id'=>$module['id']??0,
                'installed'=>(bool)$module,
                'module'=>$module,
                'preview'=>'/modules/'.$name.'/static/preview.jpg'
            ];
    }

}
