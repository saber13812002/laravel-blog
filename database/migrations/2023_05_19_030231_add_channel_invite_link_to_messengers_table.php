<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChannelInviteLinkToMessengersTable extends Migration
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
            $table->string('bale_channel_invite_link', 200)->after('bale_bot_token')->nullable();
            $table->string('telegram_channel_invite_link', 200)->after('telegram_bot_token')->nullable();
            $table->string('eitaa_channel_invite_link', 200)->after('eitaa_bot_token')->nullable();
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
            $table->dropColumn('bale_channel_invite_link');
            $table->dropColumn('telegram_channel_invite_link');
            $table->dropColumn('eitaa_channel_invite_link');
        });
    }
}
