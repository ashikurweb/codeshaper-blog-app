<?php

namespace App\Console;

use App\Console\Commands\BlogPublished;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $commands = [
        BlogPublished::class, 
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('blog:published')->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands'); 
    }
}
