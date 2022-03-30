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
        Schema::create('shares', function (Blueprint $table) {
            $table->id('share_id');
            $table->timestamps();
        });
        Schema::table('shares', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id_share');
            $table->unsignedBigInteger('post_id_share');
            $table->foreign('user_id_share')->references('user_id')->on('users');
            $table->foreign('post_id_share')->references('post_id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shares');
    }
};
