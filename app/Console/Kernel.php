<?php

namespace App\Console;

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
        Commands\SendDailyNotification::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('daily:notification')
            ->daily()
            ->at('8:00');

        $schedule->command('command:getODSOrganizations')
          ->timezone('America/Vancouver')
          ->dailyAt('00:25')
          ->runInBackground();

        $schedule->command('command:GetODSEmployeeDemographics')
          ->timezone('America/Vancouver')
          ->dailyAt('00:00')
          ->runInBackground();

        // $schedule->command('command:StoreODSData')
        //   ->timezone('America/Vancouver')
        //   ->hourlyAt(1)
        //   ->runInBackground();

        $schedule->command('command:getODSOrgNodes')
          ->timezone('America/Vancouver')
          ->dailyAt('00:15')
          ->runInBackground();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
