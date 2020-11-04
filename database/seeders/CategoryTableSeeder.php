<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{

    public function run()
    {
    	Category::create( [
            'name' =>'Food & Beverages',
        ] );

        Category::create( [
            'name' =>'Parcel/Documents',
        ] );

        Category::create( [
            'name' =>'Gadgets',
        ] );

    }
}
