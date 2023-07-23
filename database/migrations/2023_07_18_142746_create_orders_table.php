<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('orders', function (Blueprint $table){
            $table->id();
            $table->string('customer_name')->unique();
            $table->string('customer_email')->unique();
            $table->string('customer_phone')->unique();
            $table->string('shipping_address')->unique();
            $table->string('note')->nullable();
            $table->integer('total');
            $table->bigInteger('user_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('payment_method')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('orders');
    }
};
