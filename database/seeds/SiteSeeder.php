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
            'https' => true,
            'domain' => 'wxnet.vip',
            'config' => [],
            'user_id' => 1
        ]);
    }
}
