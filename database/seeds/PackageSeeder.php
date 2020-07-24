<?php

use Illuminate\Database\Seeder;
use App\Models\Package;
class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // factory(Package::class,10)->create();
        $package = new Package();
        $package->title = '体验套餐';
        $package->save();

        $package = new Package();
        $package->title = 'VIP套餐';
        $package = $package->save();

        // 套餐所用模块
        DB::table('module_package')->insert([
            'package_id'=>1,
            'module_id'=>1,
        ]);
        DB::table('module_package')->insert([
            'package_id'=>2,
            'module_id'=>1,
        ]);
        DB::table('module_package')->insert([
            'package_id'=>2,
            'module_id'=>2,
        ]);


    }

}
