<?php

namespace App\Helpers;

use App\Jobs\MessengerSenderJob;
use App\Models\Messenger;

class MessengerHelper
{

    public static function send($message, $author_id)
    {
        $messenger = Messenger::whereUserId($author_id)->get()->first();

        if ($messenger) {
            $messageEitaa = str_replace(['<p>', '</p>'], '', $message);
            $messageTelegram = nl2br(str_replace(['<br>'], "
", $messageEitaa), false);

            if ($messenger->bale_bot_token && $messenger->bale_channel_chat_id) {
                MessengerSenderJob::dispatch($messageTelegram, $messenger, 'bale');
            }

            if ($messenger->telegram_bot_token && $messenger->telegram_channel_chat_id) {
                MessengerSenderJob::dispatch($messageTelegram, $messenger, 'telegram');
            }

            if ($messenger->eitaa_bot_token && $messenger->eitaa_channel_chat_id) {
                MessengerSenderJob::dispatch($messageEitaa, $messenger, 'eitaa');
            }
        }
    }
}
