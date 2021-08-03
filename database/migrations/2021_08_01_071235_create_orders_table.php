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
            $table->string('session_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('name');
            $table->unsignedBigInteger('phone');
            $table->string('email')->nullable();
            $table->string('address');
            $table->enum('delivery_method', ['курьер', 'самовывоз'])->default('самовывоз');
            $table->string('comment')->nullable();
            $table->enum('status', ['оформлен', 'в работе', 'выполнен'])->default('оформлен');
            $table->unsignedBigInteger('delivery_cost')->default(0);
            $table->unsignedBigInteger('total_price');
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
