<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            # chứa 1 địa chỉ giao hàng
            $table->unsignedInteger('shipping_address_id');
            $table->foreign('shipping_address_id')->references('id')->on('shipping_address');
            # thanh toán vd thanh toán cod cần có xác nhận trả tiền chưa dù đơn hàng đc tạo liên kết 1 1 luôn
            $table->unsignedInteger('payment_id');
            $table->foreign('payment_id')->references('id')->on('payment');
            # customer
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customer');

            $table->integer('total_quantity');
            $table->integer('grand_total'); 
            $table->string('note')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('order');
    }
}
