<?php

namespace App\Http\Controllers;

use App\Helpers\BotHelper;
use App\Helpers\UserAlertHelper;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function handle()
    {
        $allJobs = Job::all();

        // dd(count($allJobs));
        foreach ($allJobs as $job) {
            $payload = ($job->payload);
            $object = json_decode($payload);
            $messengerSenderJob = unserialize($object->data->command);

            BotHelper::sendMessageWithJob($messengerSenderJob);
            $job->delete();
        }
        return 0;
    }

    public function daily(Request $request)
    {

        if (!$request->has('token')) {
            return 0;
        }

        if ($request->input('token') != env('BOT_MOTHER_TOKEN_BALE'))
            return -1;


        UserAlertHelper::handle();

        return 1;
    }
}
