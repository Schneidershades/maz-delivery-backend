<?php

namespace Database\Seeders;

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
        $this->call(ServiceRateTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(StateTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(VehicleTableSeeder::class);
        $this->call(RydecoinPackageTableSeeder::class);
    }
}
