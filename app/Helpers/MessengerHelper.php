<?php

namespace App\Helpers;

use App\Models\Messenger;

class MessengerHelper
{

    public static function send($message, $author_id, $type)
    {
        $messenger = Messenger::whereUserId($author_id)->get()->first();

        if ($messenger) {
            if ($messenger->bale_bot_token && $messenger->bale_channel_chat_id) {
                BotHelper::sendMessage($message, $messenger->bale_bot_token, $messenger->bale_channel_chat_id, 'bale');
            }

            if ($messenger->telegram_bot_token && $messenger->telegram_channel_chat_id) {
                BotHelper::sendMessage(strip_tags($message), $messenger->telegram_bot_token, $messenger->telegram_channel_chat_id, 'telegram');
            }

            if ($messenger->eitaa_bot_token && $messenger->eitaa_channel_chat_id) {
                BotHelper::sendMessageEitaa(strip_tags($message), $messenger->eitaa_bot_token, $messenger->eitaa_channel_chat_id, 'eitaa');
            }
        }
    }
}
