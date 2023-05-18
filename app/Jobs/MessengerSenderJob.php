<?php

namespace App\Jobs;

use App\Helpers\BotHelper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

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
        BotHelper::sendMessage($this->message, $this->messenger->bale_bot_token, $this->messenger->bale_channel_chat_id, $this->type);
    }
}
