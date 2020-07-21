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
//        factory(Package::class,10)->create();
        $package = new Package();
        $package->title = '体验套餐';
        $package->save();
    }

}
