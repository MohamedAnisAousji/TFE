<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    protected $routeMiddleware = [
        'auth.client' => \App\Http\Middleware\EnsureUserIsClient::class,
        'logout.other.guards' => \App\Http\Middleware\LogoutOtherGuards::class,


        // autres middlewares...
    ];

    protected $middlewareGroups = [
        'web' => [
            // Autres middleware...
            \App\Http\Middleware\SetLocale::class,
            \App\Http\Middleware\LogUserLogin::class,
        ],

        'api' => [
            // Middleware API...
        ],
    ];



}
