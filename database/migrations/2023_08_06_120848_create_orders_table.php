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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id")->unsigned();
            $table->string("name");
            $table->string("phone");
            $table->string("email");
            $table->string("address");
            $table->text("note")->nullable();
            $table->enum("status", ["pending", "processing", "completed", "decline"])->default("pending");
            $table->string('sub_total');
            $table->string("shipping_fee")->default(0);
            $table->string("discount")->default(0);
            $table->string("total_price");
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
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
};
