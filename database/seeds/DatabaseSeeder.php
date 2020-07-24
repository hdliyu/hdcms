<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeeder::class);
         $this->call(PackageSeeder::class);
         $this->call(GroupSeeder::class);
         $this->call(ConfigSeeder::class);
    }
}
