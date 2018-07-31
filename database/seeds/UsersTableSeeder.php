<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \BCES\Models\User::create([
            'name' => 'Admin User',
            'username' => 'admin',
            'email' => 'admin@furtcoin.com',
            'password' => bcrypt('admin@furtcoin.com'),
            'activated' => true
        ]);

        $user->referral()->create([
            'referral' => str_random()
        ]);

        // $user = \BCES\Models\User::create([
        //     'name' => 'Dashboard Client',
        //     'username' => 'dashboard',
        //     'email' => 'dashboard@furtcoin.com',
        //     'password' => bcrypt('dashboard@furtcoin.com'),
        //     'activated' => true
        // ]);

        // $user->referral()->create([
        //     'referral' => str_random()
        // ]);
    }
}
