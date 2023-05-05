<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messengers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');

            $table->unsignedBigInteger('bale_channel_chat_id')->nullable();
            $table->string('bale_bot_token', 60)->nullable();

            $table->unsignedBigInteger('telegram_channel_chat_id')->nullable();
            $table->string('telegram_bot_token', 60)->nullable();

            $table->unsignedBigInteger('eitaa_channel_chat_id')->nullable();
            $table->string('eitaa_bot_token', 60)->nullable();

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
        Schema::dropIfExists('messengers');
    }
}
