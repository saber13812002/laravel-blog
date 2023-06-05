<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChatIdIntoMessengersTable extends Migration
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
            $table->bigInteger('bale_admin_chat_id')->after('bale_channel_chat_id')->signed()->nullable();
            $table->bigInteger('telegram_admin_chat_id')->after('telegram_channel_chat_id')->signed()->nullable();
            $table->bigInteger('eitaa_admin_chat_id')->after('eitaa_channel_chat_id')->signed()->nullable();
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
            $table->dropColumn('bale_admin_chat_id');
            $table->dropColumn('telegram_admin_chat_id');
            $table->dropColumn('eitaa_admin_chat_id');
        });
    }
}
