<?php

use App\User;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,50)->create();
        $user = User::find(1);
        $user->name = 'hdliyu';
        $user->password = bcrypt('admin888');
        $user->email = '278746453@qq.com';
        $user->save();

        $user = User::find(2);
        $user->name = 'lisi';
        $user->password = bcrypt('admin888');
        $user->email = '278746454@qq.com';
        $user->save();
    }
}
