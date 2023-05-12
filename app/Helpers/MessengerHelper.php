<?php

namespace App\Helpers;

use App\Models\Messenger;

class MessengerHelper
{

    public static function send($message, $author_id, $type)
    {
        $messenger = Messenger::whereUserId($author_id)->get()->first();

        if ($messenger->bale_bot_token && $messenger->bale_channel_chat_id) {

            BotHelper::sendMesseage($message,$messenger->bale_bot_token, $messenger->bale_channel_chat_id, 'bale');
        }
    }
}
