<?php

namespace App\Helpers;

use App\Models\Messenger;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Telegram;

class BotHelper
{


    /**
     * @param Telegram $messenger
     * @param string $message
     * @return void
     */
    public static function sendMessages(Telegram $messenger, string $message): void
    {
        $chat_id = $messenger->ChatID();

        $content = [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'HTML'
        ];

        $messenger->sendMessage($content);
    }

    public static function sendMessage($message, $bot_token, $channel_chat_id, $type = 'telegram'): void
    {
        Log::info("bothelper:" . $message . " : " . $bot_token . " : " . $channel_chat_id . " : " . $type . " : " . Carbon::now()->toDateTimeString());
        if ($type != "eitaa") {
            $bot = new Telegram($bot_token, $type);
            self::sendMessageByChatId($bot, $channel_chat_id, $message);
        } else {
            self::sendMessageEitaa($message, $bot_token, $channel_chat_id);
        }
    }

    public static function sendMessageWithJob($messengerSenderJob)
    {
        $date = $messengerSenderJob->delay;

        // if (self::greaterThanOrEqualToNow($date)) {
        $type = $messengerSenderJob->getType();
        $message = $messengerSenderJob->getMessage();
        $token = $messengerSenderJob->getToken();
        $target_chat_id = $messengerSenderJob->getTargetChatId();

        self::sendMessage($message, $token, $target_chat_id, $type);
        // }
    }

    public static function greaterThanOrEqualToNow($date): bool
    {
        $datetime = Carbon::now();
        if ($datetime->greaterThanOrEqualTo(Carbon::now())) {
            return true;
        }
        return false;
    }

    private static function sendMessageEitaa($message, $bot_token, $channel_chat_id): void
    {
        self::call_eitaa_api($bot_token, $channel_chat_id, Str::substr($message, 0, 80) . '...', $message);
    }

    private static function call_eitaa_api($bot_token, $chat_id, $title, $text): void
    {
        // initialise the curl request
        $request = curl_init('https://eitaayar.ir/api/' . $bot_token . '/sendMessage');
        // send a file
        curl_setopt($request, CURLOPT_POST, true);
        curl_setopt($request, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt(
            $request,
            CURLOPT_POSTFIELDS,
            array(
                // 'file' => new \CurlFile(realpath('C:/Users/eitaa/Desktop/eitaa.apk')),
                'chat_id' => $chat_id,
                'title' => $title,
                'pin' => 1,
                'parse_mode' => 'html',
                'text' => $text,
                'date' => time() + 1,
                // send next 30 second
            )
        );

        // output the response
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        echo curl_exec($request);

        // close the session
        curl_close($request);
    }

    /**
     * @param Telegram $messenger
     * @param $chat_id
     * @param string $message
     * @return void
     */
    public static function sendMessageByChatId(Telegram $messenger, $chat_id, string $message): void
    {
        $content = [
            'chat_id' => $chat_id,
            'text' => $message,
            'parse_mode' => 'HTML'
        ]; // , 'parse_mode' => 'HTML');

        $messenger->sendMessage($content);
    }


    /**
     * @param Telegram $bot
     * @param string $message
     * @return void
     */
    public static function sendMessageToBotAdmin(Telegram $bot, string $message): void
    {
        BotHelper::sendMessageByChatId($bot, env('SUPER_ADMIN_CHAT_ID_BALE'), $message);
    }


    /**
     * @param string $message
     * @param $type
     * @return void
     */
    public static function sendMessageToSuperAdmin(string $message, $type): void
    {
        $bot = new Telegram($type == 'bale' ? env('BOT_MOTHER_TOKEN_BALE') : env('BOT_MOTHER_TOKEN_TELEGRAM'), $type);
        BotHelper::sendMessageByChatId($bot, $type == 'bale' ? env('SUPER_ADMIN_CHAT_ID_BALE') : env('SUPER_ADMIN_CHAT_ID_TELEGRAM'), $message);
    }

    public static function addSignIfConfig(mixed $message, $messenger): string
    {

        if ($messenger->bale_bot_token && $messenger->bale_channel_chat_id && $messenger->bale_channel_invite_link) {
            $message .= "
👇👇👇
بله
" . $messenger->bale_channel_invite_link;
        }

        if ($messenger->telegram_bot_token && $messenger->telegram_channel_chat_id && $messenger->telegram_channel_invite_link) {
            $message .= "
تلگرام
" . $messenger->telegram_channel_invite_link;
        }

        if ($messenger->eitaa_bot_token && $messenger->eitaa_channel_chat_id && $messenger->eitaa_channel_invite_link) {
            $message .= "
ایتا
" . $messenger->eitaa_channel_invite_link;
        }
        return $message;
    }
}
