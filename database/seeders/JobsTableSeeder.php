<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('jobs')->delete();
        
        \DB::table('jobs')->insert(array (
            0 => 
            array (
                'id' => 1703,
                'queue' => 'default',
                'payload' => '{"uuid":"3414ab70-66e7-469c-9441-375ef92b4162","displayName":"App\\\\Jobs\\\\MessengerSenderJob","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\MessengerSenderJob","command":"O:27:\\"App\\\\Jobs\\\\MessengerSenderJob\\":13:{s:10:\\"\\u0000*\\u0000message\\";s:267:\\"وسط بحث خواستم بگم راننده اسنپی که کولر می زنه گلیست از گل های بهشت دعا کنید خدا زیادشون کنه.قم اینجوریه شوفاژ و خاموش می کنیم باید کولر و سرویس کنیم\\";s:12:\\"\\u0000*\\u0000messenger\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":4:{s:5:\\"class\\";s:20:\\"App\\\\Models\\\\Messenger\\";s:2:\\"id\\";i:1;s:9:\\"relations\\";a:0:{}s:10:\\"connection\\";s:5:\\"mysql\\";}s:7:\\"\\u0000*\\u0000type\\";s:4:\\"bale\\";s:3:\\"job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:19:\\"chainCatchCallbacks\\";N;s:5:\\"delay\\";O:25:\\"Illuminate\\\\Support\\\\Carbon\\":3:{s:4:\\"date\\";s:26:\\"2024-04-04 12:54:07.239820\\";s:13:\\"timezone_type\\";i:3;s:8:\\"timezone\\";s:12:\\"Europe\\/Paris\\";}s:11:\\"afterCommit\\";N;s:10:\\"middleware\\";a:0:{}s:7:\\"chained\\";a:0:{}}"}}',
                'attempts' => 0,
                'reserved_at' => NULL,
                'available_at' => 1712228047,
                'created_at' => 1712228045,
            ),
            1 => 
            array (
                'id' => 1704,
                'queue' => 'default',
                'payload' => '{"uuid":"cd32a240-2f27-4da6-b35c-17592bf49be7","displayName":"App\\\\Jobs\\\\MessengerSenderJob","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\MessengerSenderJob","command":"O:27:\\"App\\\\Jobs\\\\MessengerSenderJob\\":13:{s:10:\\"\\u0000*\\u0000message\\";s:267:\\"وسط بحث خواستم بگم راننده اسنپی که کولر می زنه گلیست از گل های بهشت دعا کنید خدا زیادشون کنه.قم اینجوریه شوفاژ و خاموش می کنیم باید کولر و سرویس کنیم\\";s:12:\\"\\u0000*\\u0000messenger\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":4:{s:5:\\"class\\";s:20:\\"App\\\\Models\\\\Messenger\\";s:2:\\"id\\";i:1;s:9:\\"relations\\";a:0:{}s:10:\\"connection\\";s:5:\\"mysql\\";}s:7:\\"\\u0000*\\u0000type\\";s:8:\\"telegram\\";s:3:\\"job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:19:\\"chainCatchCallbacks\\";N;s:5:\\"delay\\";O:25:\\"Illuminate\\\\Support\\\\Carbon\\":3:{s:4:\\"date\\";s:26:\\"2024-04-04 12:54:11.290925\\";s:13:\\"timezone_type\\";i:3;s:8:\\"timezone\\";s:12:\\"Europe\\/Paris\\";}s:11:\\"afterCommit\\";N;s:10:\\"middleware\\";a:0:{}s:7:\\"chained\\";a:0:{}}"}}',
                'attempts' => 0,
                'reserved_at' => NULL,
                'available_at' => 1712228051,
                'created_at' => 1712228045,
            ),
            2 => 
            array (
                'id' => 1705,
                'queue' => 'default',
                'payload' => '{"uuid":"4a2f6c14-a9a7-4443-a45c-8f8c926ada37","displayName":"App\\\\Jobs\\\\MessengerSenderJob","job":"Illuminate\\\\Queue\\\\CallQueuedHandler@call","maxTries":null,"maxExceptions":null,"failOnTimeout":false,"backoff":null,"timeout":null,"retryUntil":null,"data":{"commandName":"App\\\\Jobs\\\\MessengerSenderJob","command":"O:27:\\"App\\\\Jobs\\\\MessengerSenderJob\\":13:{s:10:\\"\\u0000*\\u0000message\\";s:267:\\"وسط بحث خواستم بگم راننده اسنپی که کولر می زنه گلیست از گل های بهشت دعا کنید خدا زیادشون کنه.قم اینجوریه شوفاژ و خاموش می کنیم باید کولر و سرویس کنیم\\";s:12:\\"\\u0000*\\u0000messenger\\";O:45:\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\":4:{s:5:\\"class\\";s:20:\\"App\\\\Models\\\\Messenger\\";s:2:\\"id\\";i:1;s:9:\\"relations\\";a:0:{}s:10:\\"connection\\";s:5:\\"mysql\\";}s:7:\\"\\u0000*\\u0000type\\";s:5:\\"eitaa\\";s:3:\\"job\\";N;s:10:\\"connection\\";N;s:5:\\"queue\\";N;s:15:\\"chainConnection\\";N;s:10:\\"chainQueue\\";N;s:19:\\"chainCatchCallbacks\\";N;s:5:\\"delay\\";O:25:\\"Illuminate\\\\Support\\\\Carbon\\":3:{s:4:\\"date\\";s:26:\\"2024-04-04 12:54:09.291555\\";s:13:\\"timezone_type\\";i:3;s:8:\\"timezone\\";s:12:\\"Europe\\/Paris\\";}s:11:\\"afterCommit\\";N;s:10:\\"middleware\\";a:0:{}s:7:\\"chained\\";a:0:{}}"}}',
                'attempts' => 0,
                'reserved_at' => NULL,
                'available_at' => 1712228049,
                'created_at' => 1712228045,
            ),
        ));
        
        
    }
}