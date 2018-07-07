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
            'email' => 'admin@artoujours.io',
            'password' => bcrypt('admin@artoujours.io'),
            'activated' => true
        ]);

        $user->referral()->create([
            'referral' => str_random()
        ]);

        $user = \BCES\Models\User::create([
            'name' => 'Dashboard Client',
            'username' => 'dashboard',
            'email' => 'oknasir@artoujours.io',
            'password' => bcrypt('oknasir22'),
            'activated' => true
        ]);

        $user->referral()->create([
            'referral' => str_random()
        ]);
    }
}
