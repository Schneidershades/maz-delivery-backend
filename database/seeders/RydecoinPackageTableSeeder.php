<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RydecoinPackage;

class RydecoinPackageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RydecoinPackage::create([
    		'name'=>'Basic',
    		'identifier'=>'#Ryd3922',
            'rydecoin'=> 10,
            'amount'=> 1000
    	]);

        RydecoinPackage::create([
            'name'=>'Gold',
            'identifier'=>'#Ryd3922',
            'rydecoin'=> 50,
            'amount'=> 3000
        ]);

        RydecoinPackage::create([
            'name'=>'Gold',
            'identifier'=>'#Ryd3922',
            'rydecoin'=> 70,
            'amount'=> 5000
        ]);
    }
}
