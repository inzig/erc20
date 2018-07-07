<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \BCES\Models\Setting::create([
            'name' => 'eth_to_artz_unit',
            'value' => '8000',
        ]);

        \BCES\Models\Setting::create([
            'name' => 'referral_discount',
            'value' => '5',
        ]);

        \BCES\Models\Setting::create([
            'name' => 'kyc_limit',
            'value' => '1000',
        ]);

        \BCES\Models\Setting::create([
            'name' => 'payment_disabled',
            'value' => 'no',
        ]);

        \BCES\Models\Setting::create([
            'name' => 'contact_us_email',
            'value' => 'support@arttoujours.io',
        ]);

        \BCES\Models\Setting::create([
            'name' => 'subscribe_email',
            'value' => 'support@arttoujours.io',
        ]);

        \BCES\Models\Setting::create([
            'name' => 'facebook_page',
            'value' => 'http://fb.com/oknasir',
        ]);

        \BCES\Models\Setting::create([
            'name' => 'twitter_page',
            'value' => 'http://fb.com/oknasir',
        ]);

        \BCES\Models\Setting::create([
            'name' => 'reddit_page',
            'value' => 'http://fb.com/oknasir',
        ]);

        \BCES\Models\Setting::create([
            'name' => 'github_page',
            'value' => 'http://fb.com/oknasir',
        ]);

        \BCES\Models\Setting::create([
            'name' => 'bitcoin_talk_page',
            'value' => 'http://fb.com/oknasir',
        ]);

        \BCES\Models\Setting::create([
            'name' => 'telegram_page',
            'value' => 'http://fb.com/oknasir',
        ]);

        \BCES\Models\Setting::create([
            'name' => 'medium_page',
            'value' => 'http://fb.com/oknasir',
        ]);

        \BCES\Models\Setting::create([
            'name' => 'increment_ethereum',
            'value' => '0',
        ]);

        \BCES\Models\Setting::create([
            'name' => 'increment_bitcoin',
            'value' => '0',
        ]);

        \BCES\Models\Setting::create([
            'name' => 'increment_litecoin',
            'value' => '0',
        ]);

        \BCES\Models\Setting::create([
            'name' => 'increment_dashcoin',
            'value' => '0',
        ]);
    }
}
