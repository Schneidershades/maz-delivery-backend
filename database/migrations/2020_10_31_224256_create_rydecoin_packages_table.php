<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRydecoinPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rydecoin_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('identifier')->nullable();
            $table->double('rydecoin',13,2)->default(0);
            $table->double('amount',13,2)->default(0);
            $table->string('percentage')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('rydecoin_packages');
    }
}
