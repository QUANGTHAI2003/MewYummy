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
        Schema::create('users', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('username')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('avatar')->nullable()->default('avatar.png');
            $table->string('phone_number')->nullable()->unique();
            $table->string('address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('is_active')->default(0)->comment('0: Offline, 1: Online');
            $table->timestamp('last_seen_at')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('users');
    }
};
