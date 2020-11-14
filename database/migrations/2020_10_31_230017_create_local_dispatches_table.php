<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalDispatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_dispatches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_rates_id')->nullable();
            $table->integer('local_dispatable_id')->nullable();
            $table->string('local_dispatable_type')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('weight')->nullable();
            $table->string('note')->nullable();
            $table->string('instructions')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->boolean('instant')->default(false);
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
        Schema::dropIfExists('local_dispatches');
    }
}
