<?php

use Illuminate\Database\Seeder;

class ICOTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \BCES\Models\User::find(1)->icos()->create([
            'type' => 'ethereum',
            'title' => '<span class="custom-icon custom-icon-3"></span> Ethereum Address',
            'address' =>'0x41e5560054824ea6b0732e656e3ad64e20e94e45',
            'hard_cap' => '225000000',
            'earnings' => '245631',
            'minimum' => '0.05',
            'active' => 1,
            'pre_sale_at' => \Carbon\Carbon::parse('2018-03-20 00:00:00'),
            'pre_sale_end_at' => \Carbon\Carbon::parse('2018-03-29 23:59:59'),
            'pre_ico_at' => \Carbon\Carbon::parse('2017-12-18 23:59:59'),
            'pre_ico_end_at' => \Carbon\Carbon::parse('2018-01-18 23:59:59'),
            'main_ico_at' => \Carbon\Carbon::parse('2018-01-22 23:59:59'),
            'ico_expire_at' => \Carbon\Carbon::parse('2018-02-28 23:59:59'),
        ]);

        \BCES\Models\User::find(2)->icos()->create([
            'type' => 'ethereum',
            'address' => '0x006282875ffb94f2f46063a00cee768003ba0ef8'
        ]);
    }
}
