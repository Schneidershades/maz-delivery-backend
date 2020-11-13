<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('identifier')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->double('amount', 13, 2)->default(0);
            $table->double('rydecoin', 13, 2)->default(0);
            $table->integer('orderable_id')->nullable();
            $table->string('orderable_type')->nullable();
            $table->integer('dispatch_id')->nullable();
            $table->string('dispatch_status')->default('pending')->nullable();
            $table->string('payment_status')->default('pending')->nullable();
            $table->text('note')->nullable();
            $table->text('rating')->nullable();
            $table->text('user_comment')->nullable();
            $table->text('dispatch_comment')->nullable();
            $table->boolean('demurrage')->default(false);
            $table->integer('demurrage_timeout_d')->default(3600);
            $table->double('false', 13, 2)->default(0);
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
        Schema::dropIfExists('orders');
    }
}
