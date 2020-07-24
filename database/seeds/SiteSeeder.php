<?php

use App\Models\Site;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Site::create([
            'title' => '后盾人',
            'domain' => 'http://houdunren.test',
            'config' => [],
            'user_id' => 1
        ]);
        DB::table('admin_site')->insert([
            'user_id'=>2,
            'site_id'=>1,
        ]);
    }
}
