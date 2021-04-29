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
        #$schedule->exec('touch /home/javier/test')->everyMinute();
        

        $schedule->call(function () {
            \Config::set('google.service.file', 'storage/credentials.json');
            $controller = new \App\Http\Controllers\HomeController();
            $tmp = $controller->up_sheet();
            #$tmp = \Redirect::route("home");
            
            var_dump(config('google.service.file'));

        })->everyMinute();
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
