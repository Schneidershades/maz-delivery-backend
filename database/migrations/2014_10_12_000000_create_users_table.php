<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('identifier')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->foreignId('city_id')->constrained('cities')->nullable();
            $table->foreignId('state_id')->constrained('states')->nullable();
            $table->foreignId('country_id')->constrained('countries')->nullable();

            $table->string('type')->nullable();
            // if type is a company
            $table->integer('staff_id')->unsigned()->index()->nullable();
            $table->boolean('staff_type')->nullable();
            $table->boolean('staff_vehicle_id')->unsigned()->index()->nullable();
            $table->boolean('active')->default(true)->nullable();
            $table->boolean('api')->default(false)->nullable();
            $table->boolean('notification')->default(false)->nullable();
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
