<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIntChatIdIntoMessengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messengers', function (Blueprint $table) {
            //
            $table->bigInteger('bale_channel_chat_id')->signed()->change();
            $table->bigInteger('telegram_channel_chat_id')->signed()->change();
            $table->bigInteger('eitaa_channel_chat_id')->signed()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messengers', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('bale_channel_chat_id')->change();
            $table->unsignedBigInteger('telegram_channel_chat_id')->change();
            $table->unsignedBigInteger('eitaa_channel_chat_id')->change();
        });
    }
}
