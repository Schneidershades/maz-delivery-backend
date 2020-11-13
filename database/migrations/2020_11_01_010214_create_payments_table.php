<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable();

            $table->double('amount', 13, 2)->default(0);
            $table->string('currency')->nullable();
            
            $table->string('type')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('payment_gateway')->nullable();
            $table->float('payment_gateway_charged_percentage')->nullable();
            $table->float('payment_gateway_expected_charged_percentage')->nullable();
            $table->string('payment_reference')->nullable();
            $table->float('payment_gateway_charge')->default(0);
            $table->float('payment_gateway_remittance')->default(0);
            $table->string('payment_code')->nullable();
            $table->string('payment_message')->nullable();
            $table->string('payment_status')->default('pending');
            $table->string('platform_initiated')->nullable();
            $table->integer('admin_action_id')->unsigned()->integer()->nullable();
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
        Schema::dropIfExists('payments');
    }
}
