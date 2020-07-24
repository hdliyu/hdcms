<?php

use Illuminate\Database\Seeder;
use App\Models\Module;
class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $preInstallModules = [
            [
                'title' => '在线课堂',
                'name' => 'Edu',
                'preview'=>'/modules/Edu/static/preview.jpg',
                'version'=> 'v1.0.0',
                'description'=> '涵盖众多功能的在线教学应用，可以访问后盾人网站体验',
            ],
            [
                'title' => '在线商城',
                'name' => 'Shop',
                'preview'=>'/modules/Shop/static/preview.jpg',
                'version'=> 'v1.0.0',
                'description'=> '涵盖众多功能的在线商城系统，可以访问后盾人网站体验',
            ]
        ];
        collect($preInstallModules)->map(function($module){
            Module::create($module);
        });
    }
}
