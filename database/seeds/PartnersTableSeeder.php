<?php

use Illuminate\Database\Seeder;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \BCES\Models\Partner::create([
            'name' => 'CoinGecko',
            'avatar' => 'images/icon-1.png',
            'title' => 'Partner'
        ]);

        \BCES\Models\Partner::create([
            'name' => 'Cointelegraph',
            'avatar' => 'images/icon-2.png',
            'title' => 'Partner'
        ]);

        \BCES\Models\Partner::create([
            'name' => 'BTCXCHANGE',
            'avatar' => 'images/icon-3.png',
            'title' => 'Partner'
        ]);

        \BCES\Models\Partner::create([
            'name' => 'TokenMarket',
            'avatar' => 'images/icon-4.png',
            'title' => 'Partner'
        ]);

        \BCES\Models\Partner::create([
            'name' => 'CryptoCompare',
            'avatar' => 'images/icon-5.png',
            'title' => 'Partner'
        ]);
    }
}
