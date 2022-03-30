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

    //  create_likes_table
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id('like_id');
           
            $table->timestamps();
        });

        Schema::table('likes', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('post_id')->references('post_id')->on('posts');
            $table->foreign('user_id')->references('user_id')->on('users');
            // $table->unsignedBigInteger('share_id');
            // $table->foreign('share_id')->references('share_id')->on('shares');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
};
