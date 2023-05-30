<?php

namespace App\Jobs;

use App\Helpers\BotHelper;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class MessengerSenderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $message;
    protected $messenger;
    protected $type;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($message, $messenger, $type)
    {
        $this->message = $message;
        $this->messenger = $messenger;
        $this->type = $type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Log::info("MessageSenderJob:" . $this->message . " : " . $this->messenger->bale_bot_token . " : " . $this->messenger->bale_channel_chat_id . " : " . $this->type . " : " . Carbon::now()->toDateTimeString());

        if ($this->type == 'bale')
            BotHelper::sendMessage($this->message, $this->messenger->bale_bot_token, $this->messenger->bale_channel_chat_id, $this->type);
        if ($this->type == 'telegram')
            BotHelper::sendMessage($this->message, $this->messenger->telegram_bot_token, $this->messenger->telegram_channel_chat_id, $this->type);
        if ($this->type == 'eitaa')
            BotHelper::sendMessage($this->message, $this->messenger->eitaa_bot_token, $this->messenger->eitaa_channel_chat_id, $this->type);
    }
}
