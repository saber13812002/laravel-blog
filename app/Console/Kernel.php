<?php

namespace App\Console;

use App\Console\Commands\UserPostAlertCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('backup:clean')->daily()->at('01:00');
        $schedule->command('backup:run')->daily()->at('02:00');
        $schedule->command('telescope:prune')->daily()->at('03:00');
        $schedule->command(UserPostAlertCommand::class)->tuesdays("14:29"); //17:59 iran
        $schedule->command('queue:work --stop-when-empty')->everyMinute()->withoutOverlapping();

        $schedule->command('app:userpostalert')->dailyAt("6:30"); //10:00 iran


    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
