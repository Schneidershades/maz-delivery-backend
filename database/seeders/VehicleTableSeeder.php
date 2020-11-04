<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create([
    		'name'=>'Dispatch',
    	]);
    }
}
