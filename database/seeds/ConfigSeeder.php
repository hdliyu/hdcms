<?php

use Illuminate\Database\Seeder;
use App\Models\Config;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Config::create(['config'=>[
               'title'=>'后盾人',
               'logo'=>'images/logo.png',
               'copyright'=>'后盾人 人人做后盾<br>Powerd by hdcms v6 2014-2020 www.hdcms.com',
        ]]);
    }
}
