<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerShippingAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_shipping_address', function (Blueprint $table) {
            $table->increments('id');
            # 1 khách có nhiều địa chỉ
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customer');
            $table->string('recipient_name');
            $table->string('recipient_phone');
            $table->string('province');
            $table->string('district');
            $table->string('wards');
            $table->string('address_detail');
            $table->tinyInteger('default')->default(0);#mặc định 0 hay 1
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
        Schema::dropIfExists('customer_shipping_address');
    }
}
