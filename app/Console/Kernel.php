<?php

namespace App\Console;

use App\Console\Commands\Expiration;
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
        Expiration::class
    ];

    /**
     * Define the application's command schedule.
     *
     * /bin/sh domains/karimsaleh.tech/public_html/ookpi/script.sh
     * * * * * *	/usr/bin/php /home/u459353948/domains/karimsaleh.tech/public_html/ookpi && '/opt/alt/php80/usr/bin/php' 'artisan' schedule:run
     * * * * * *	/bin/sh domains/karimsaleh.tech/public_html/ookpi/script.sh
     *
     * #!/bin/sh
* /opt/alt/php80/usr/bin/php /home/u459353948/domains/karimsaleh.tech/public_html/ookpi/App/Console/Kernel.php cron:run > /dev/null 2>&1
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->command('inspire')->hourly();
        $schedule->command('queue:work')->everyMinute();
        $schedule->command('user:expire')->everyMinute();
        $schedule->command('queue:restart')->everyFiveMinutes();
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
