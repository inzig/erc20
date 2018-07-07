<?php

namespace BCES\Console;

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
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /**
         * Update Crypto Currency every 5 minutes
         */
        $schedule->command(Commands\UpdateCCRates::class)->everyFiveMinutes()->sendOutputTo('storage/logs/update-rates.log');

        /**
         * Update Transactions every 30 minutes
         */
        $schedule->command(Commands\UpdateEthereumTransactions::class)->everyThirtyMinutes()->sendOutputTo('storage/logs/update-eth-transactions.log');
        $schedule->command(Commands\UpdateBitcoinTransactions::class)->everyThirtyMinutes()->sendOutputTo('storage/logs/update-btc-transactions.log');
        $schedule->command(Commands\UpdateLitecoinTransactions::class)->everyThirtyMinutes()->sendOutputTo('storage/logs/update-ltc-transactions.log');
        $schedule->command(Commands\UpdateDashcoinTransactions::class)->everyThirtyMinutes()->sendOutputTo('storage/logs/update-dash-transactions.log');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
