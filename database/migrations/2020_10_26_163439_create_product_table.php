<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('category');
            $table->string('name');#tên sản phẩm
            $table->string('brand');#thương hiệu
            $table->string('origin');#xuất xứ
            $table->integer('price');#giá bán ban đầu
            $table->integer('promotion_price');# giá ưu đãi
            $table->string('description',2000);# mô tả chi tiết  
            $table->tinyInteger('enabled')->default(1);# nếu là 1 thì bán , 0 thì ẩn đi
            $table->integer('quantity_in_stock'); # số lượng sản phẩm còn trong kho
            $table->integer('views');# số lượt xem
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
        Schema::dropIfExists('product');
    }
}
