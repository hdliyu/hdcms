<?php

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            ['title'=>'普通会员组'],
            ['title'=>'高级会员组'],
        ];
        collect($groups)->map(function($group){
            Group::create($group);
        });
        // 所用套餐
        DB::table('group_package')->insert([
            'group_id'=>1,
            'package_id'=>1,
        ]);
        DB::table('group_package')->insert([
            'group_id'=>2,
            'package_id'=>1,
        ]);
        DB::table('group_package')->insert([
            'group_id'=>2,
            'package_id'=>2,
        ]);
    }
}
