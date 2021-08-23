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
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('address');
            $table->string('item');
            $table->string('transport_mode');
            $table->string('country');
            $table->string('status');
            $table->integer('weight');
            $table->double('weight_price');
            $table->double('country_price');
            $table->double('mode_price');
            $table->string('delivery');
            $table->string('shipping_day');
            $table->double('tax');
            $table->double('total_amount');
            $table->string('reference');
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
