<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_item', function (Blueprint $table) {
            $table->increments('id');
            # ma don hang
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')->references('id')->on('order');
            #ma san pham
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id')->on('product');
            #đánh giá khi nhận hàng
            $table->unsignedInteger('review_id');
            $table->foreign('review_id')->references('id')->on('review');
            #gia tung thoi diem
            $table->integer('price_sell');
            #so luong
            $table->integer('quantity');
            #thanh tien
            $table->integer('sub_total');
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
        Schema::dropIfExists('order_item');
    }
}
