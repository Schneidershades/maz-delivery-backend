<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_rates', function (Blueprint $table) {
            $table->id();
            $table->integer('settingable_id')->nullable();
            $table->string('settingable_type')->nullable();
            $table->string('type')->nullable();
            $table->double('rate', 13, 2)->default(0);
            $table->double('cap_max_rate', 13, 2)->default(0);
            $table->double('cap_min_rate', 13, 2)->default(0);
            $table->double('discount_amount', 13, 2)->default(0);
            $table->double('discount_percentage', 13, 2)->default(0);
            $table->double('cap', 13, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_rates');
    }
}
