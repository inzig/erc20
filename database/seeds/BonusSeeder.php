<?php

use Illuminate\Database\Seeder;

class BonusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \BCES\Models\ICOBonus::create([
            'type' => 'Pre Sale',
            'discount' => '40',
        ]);

        \BCES\Models\ICOBonus::create([
            'type' => 'Pre ICO',
            'discount' => '30',
        ]);

        \BCES\Models\ICOBonus::create([
            'week' => '1',
            'type' => 'week',
            'discount' => '20',
        ]);

        \BCES\Models\ICOBonus::create([
            'week' => '2',
            'type' => 'week',
            'discount' => '15',
        ]);

        \BCES\Models\ICOBonus::create([
            'week' => '3',
            'type' => 'week',
            'discount' => '10',
        ]);

        \BCES\Models\ICOBonus::create([
            'type' => 'Remaining days',
            'discount' => '0',
        ]);
    }
}
