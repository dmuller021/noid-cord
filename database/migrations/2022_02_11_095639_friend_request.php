<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FriendRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::create('friend_request', function (Blueprint $table) {
           $table->id();
           $table->unsignedBigInteger('user_id_1');
           $table->unsignedBigInteger('user_id_2');

           $table->foreign('user_id_1')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');

           $table->foreign('user_id_2')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friend_request');
    }
}
