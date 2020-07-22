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
            ['title'=>'VIP'],
        ];
        collect($groups)->map(function($group){
            Group::create($group);
        });
    }
}
