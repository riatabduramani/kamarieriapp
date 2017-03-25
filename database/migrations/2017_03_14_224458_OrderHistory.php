<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('business_id');
            $table->integer('table_nr');
            $table->integer('customer_nr');
            $table->string('device');
            $table->text('comment');
            $table->boolean('seen')->default(0);
            $table->timestamps();
        });

        Schema::create('order_history', function ($table) {
            $table->increments('id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->string('product_name');
            $table->decimal('price');
            $table->string('ingredients', 255)->nullable();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_history');
        Schema::drop('orders');
    }
}
