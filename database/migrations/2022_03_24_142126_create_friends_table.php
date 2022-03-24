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
        Schema::create('friends', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->timestamps();
        });
        Schema::table('friends', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id_send');
            $table->unsignedBigInteger('user_id_get');
            $table->foreign('user_id_send')->references('user_id')->on('users');
            $table->foreign('user_id_get')->references('user_id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friends');
    }
};
