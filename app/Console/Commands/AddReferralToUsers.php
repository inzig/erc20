<?php

namespace BCES\Console\Commands;

use BCES\Models\User;
use Illuminate\Console\Command;

class AddReferralToUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:referral';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add referral to users which do not have referral link.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        User::chunk(100, function ($users) {
            $users->each(function ($user) {
                if (!$user->referral) {
                    $user->referral()->create([
                        'referral' => str_random()
                    ]);
                }
            });
        });
    }
}
