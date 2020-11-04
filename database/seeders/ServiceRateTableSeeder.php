<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceRate;

class ServiceRateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ServiceRate::create( [
    		'settingable_id' =>1,
    		'settingable_type' =>'errands',
    		'type'=> 'basic',
    		'rate'=> 2000,
    		'cap_max_rate'=> 0,
    		'cap_min_rate'=> 0,
    		'discount_amount'=> 0,
    		'discount_percentage'=> 0,
    		'cap' => 0
    	] );

    	ServiceRate::create( [
    		'settingable_id' => 1,
    		'settingable_type' =>'errands',
    		'type'=> 'day',
    		'rate'=> 9000,
    		'cap_max_rate'=> 0,
    		'cap_min_rate'=> 0,
    		'discount_amount'=> 0,
    		'discount_percentage'=> 0,
    		'cap' => 0
    	] );

    	ServiceRate::create( [
    		'settingable_id' => 1,
    		'settingable_type' =>'local_dispatches',
    		'type'=> 'local_dispatches',
    		'rate'=> 2000,
    		'cap_max_rate'=> 0,
    		'cap_min_rate'=> 0,
    		'discount_amount'=> 0,
    		'discount_percentage'=> 0,
    		'cap' => 0
    	] );

    	ServiceRate::create( [
    		'settingable_id' => 1,
    		'settingable_type' =>'mobile_transactions',
    		'type'=> 'mobile_transactions',
    		'rate'=> 200,
    		'cap_max_rate'=> 0,
    		'cap_min_rate'=> 0,
    		'discount_amount'=> 0,
    		'discount_percentage'=> 0,
    		'cap' => 0
    	] );

    	ServiceRate::create( [
    		'settingable_id' => 1,
    		'settingable_type' =>'inventories',
    		'type'=> 'inventories',
    		'rate'=> 200,
    		'cap_max_rate'=> 0,
    		'cap_min_rate'=> 0,
    		'discount_amount'=> 0,
    		'discount_percentage'=> 0,
    		'cap' => 0
    	] );



    	ServiceRate::create( [
    		'settingable_id' => 1,
    		'settingable_type' =>'request_vans',
    		'type'=> 'request_vans',
    		'rate'=> 30000,
    		'cap_max_rate'=> 0,
    		'cap_min_rate'=> 0,
    		'discount_amount'=> 0,
    		'discount_percentage'=> 0,
    		'cap' => 0
    	] );


    	ServiceRate::create( [
    		'settingable_id' => null,
    		'settingable_type' => null,
    		'type'=> 'rydecoin',
    		'rate'=> 200,
    		'cap_max_rate'=> 0,
    		'cap_min_rate'=> 0,
    		'discount_amount'=> 0,
    		'discount_percentage'=> 0,
    		'cap' => 0
    	] );
    }
}
