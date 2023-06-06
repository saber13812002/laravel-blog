<?php

namespace App\Console\Commands;

use App\Helpers\BotHelper;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class UserPostAlertCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:userpostalert';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::get();
//        dd($users);
        foreach ($users as $user) {
//            dd($user->id,$user->name);
            $lastPost = $user->posts()->latest()->limit(1)->first();
            if ($lastPost && $lastPost->count() > 0) {
//            dd($lastPost->created_at);
                $now = Carbon::now();

                $diff = $lastPost->created_at->diffInDays($now);

//            dd($diff);

//                dd($user->messenger);
                if ($diff > 1) {
                    $message = "کاربر محترم!

شما الان " . $diff . " روز است که مطلبی نفرستادید";

//                if ($user->messenger->telegram_admin_chat_id) {
//                    BotHelper::sendMessage($message, $user->messenger->telegram_bot_token, $user->messenger->telegram_channel_chat_id, 'telegram');
//                }

//                dd($user->messenger->bale_bot_token);
                    if ($user->messenger && $user->messenger->bale_admin_chat_id) {
                        BotHelper::sendMessage($message, $user->messenger->bale_bot_token, $user->messenger->bale_admin_chat_id, 'bale');
                        BotHelper::sendMessageToSuperAdmin($message . $user->name, 'bale');
                    }

                    Log::info($user->name . ': ' . $message);
                }
            }
        }
    }
}
