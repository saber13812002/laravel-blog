<?php

namespace App\Helpers;

use Telegram;

class BotHelper
{


    /**
     * @param Telegram $messenger
     * @param string $message
     * @return void
     */
    public static function sendMessage(Telegram $messenger, string $message): void
    {
        $chat_id = $messenger->ChatID();

        $content = [
            'chat_id' => $chat_id,
            'text' => $message
        ];

        $messenger->sendMessage($content);
    }

    public static function sendMesseage($message, $bot_token, $channel_chat_id, $type = 'telegram'): void
    {
        $bot = new Telegram($bot_token, $type);
        self::sendMessageByChatId($bot, $channel_chat_id, $message);
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
            'text' => $message
        ];

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
}
