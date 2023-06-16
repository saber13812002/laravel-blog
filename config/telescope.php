<?php

use Laravel\Telescope\Http\Middleware\Authorize;
use Laravel\Telescope\Watchers;

return [

    'path' => 'telescope',

    /*
    |--------------------------------------------------------------------------
    | Telescope Storage Driver
    |--------------------------------------------------------------------------
    |
    | This configuration options determines the storage driver that will
    | be used to store Telescope's data. In addition, you may set any
    | custom options as needed by the particular driver you choose.
    |
    */
    'enabled' => env('TELESCOPE_ENABLED', false),

    'driver' => env('TELESCOPE_DRIVER', 'database'),

    'storage' => [
        'database' => [
            'connection' => env('DB_CONNECTION', 'mysql'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Telescope Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will be assigned to every Telescope route, giving you
    | the chance to add your own middleware to this list or change any of
    | the existing middleware. Or, you can simply stick with this list.
    |
    */

    'middleware' => [
        'web',
        Authorize::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Telescope Watchers
    |--------------------------------------------------------------------------
    |
    | The following array lists the "watchers" that will be registered with
    | Telescope. The watchers gather the application's profile data when
    | a request or task is executed. Feel free to customize this list.
    |
    */

    'watchers' => [
        Watchers\CacheWatcher::class => env('TELESCOPE_CACHE_WATCHER', false),
        Watchers\CommandWatcher::class => env('TELESCOPE_COMMAND_WATCHER', false),
        Watchers\DumpWatcher::class => env('TELESCOPE_DUMP_WATCHER', false),
        Watchers\EventWatcher::class => env('TELESCOPE_EVENT_WATCHER', false),
        Watchers\ExceptionWatcher::class => env('TELESCOPE_EXCEPTION_WATCHER', false),
        Watchers\JobWatcher::class => env('TELESCOPE_JOB_WATCHER', false),
        Watchers\LogWatcher::class => env('TELESCOPE_LOG_WATCHER', false),
        Watchers\MailWatcher::class => env('TELESCOPE_MAIL_WATCHER', false),
        Watchers\ModelWatcher::class => env('TELESCOPE_MODEL_WATCHER', false),
        Watchers\NotificationWatcher::class => env('TELESCOPE_NOTIFICATION_WATCHER', false),

        Watchers\QueryWatcher::class => [
            'enabled' => env('TELESCOPE_QUERY_WATCHER', false),
            'slow' => 100,
        ],

        Watchers\RedisWatcher::class => env('TELESCOPE_REDIS_WATCHER', false),

        Watchers\RequestWatcher::class => [
            'enabled' => env('TELESCOPE_REQUEST_WATCHER', false),
            'size_limit' => env('TELESCOPE_RESPONSE_SIZE_LIMIT', 64),
        ],

        Watchers\ScheduleWatcher::class => env('TELESCOPE_SCHEDULE_WATCHER', false),
    ],
];
