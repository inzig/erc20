<?php

namespace BCES\Console\Commands;

use BCES\Models\Reward;
use BCES\Models\Setting;
use BCES\Models\User;
use Illuminate\Console\Command;

class UpdateReferralRewards extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'referral:rewards';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reward to those user who do not get referral awards.';

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
        $refDiscount = Setting::whereName('referral_discount')->first()->value;
        User::chunk(100, function ($users) use ($refDiscount) {
            $users->each(function ($user) use ($refDiscount) {
                if ($user->id != 1) {
                    $referrer = $user->referrer;
                    if ($referrer->count()) {
                        $user->history->each(function ($history) use ($refDiscount, $referrer) {
                            if (!$history->reward) {
                                $reward = Reward::newModelInstance([
                                    'bnes' => $history->bnes * ($refDiscount / 100)
                                ]);

                                $reward->user()->associate($referrer->first()->user);
                                $reward->referral()->associate($referrer->first());
                                $reward->transaction()->associate($history);

                                $reward->save();
                            }
                        });
                    }
                }
            });
        });
    }
}
