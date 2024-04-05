<?php

namespace App\Http\Controllers;

use App\Helpers\BotHelper;
use App\Http\Controllers\Controller;
use App\Jobs\MessengerSenderJob;
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
            $messengerSenderJob  = unserialize($object->data->command);
            
            BotHelper::sendMessageWithJob($messengerSenderJob);
            $job->delete();
        }
        return 0;
    }
}
