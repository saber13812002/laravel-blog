<?php

namespace App\Helpers;

use App\Jobs\MessengerSenderJob;
use App\Models\Messenger;

class MessengerHelper
{

    public static function send($message, $author_id, $type)
    {
        $messenger = Messenger::whereUserId($author_id)->get()->first();

        if ($messenger) {
            if ($messenger->bale_bot_token && $messenger->bale_channel_chat_id) {
                MessengerSenderJob::dispatch(strip_tags(htmlentities($message)), $messenger, 'bale');
            }

            if ($messenger->telegram_bot_token && $messenger->telegram_channel_chat_id) {
                MessengerSenderJob::dispatch(strip_tags(htmlentities($message)), $messenger, 'telegram');
            }

            if ($messenger->eitaa_bot_token && $messenger->eitaa_channel_chat_id) {
                MessengerSenderJob::dispatch(strip_tags(htmlentities($message)), $messenger, 'eitaa');
            }
        }
    }
}
