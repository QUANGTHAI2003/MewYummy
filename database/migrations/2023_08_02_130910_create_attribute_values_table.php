<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_values', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_attribute_id')->unsigned()->nullable();
            $table->string('product_attribute_value')->nullable();
            $table->integer('product_attribute_price')->default(0);
            $table->integer('product_attribute_sale_price')->default(0)->nullable();
            $table->integer('product_attribute_quantity')->default(0)->nullable();
            $table->bigInteger('product_id')->unsigned()->nullable();
            $table->foreign('product_attribute_id')->references('id')->on('product_attributes')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('attribute_values');
    }
};
