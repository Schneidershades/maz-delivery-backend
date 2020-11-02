<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{

    public function run()
    {
        \App\Models\Category::create( [
            'name' =>'Computing and ICT',
        ] );

    }
}
