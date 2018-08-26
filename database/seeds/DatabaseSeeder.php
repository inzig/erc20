<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ICOTableSeeder::class);
        $this->call(RoadmapsTableSeeder::class);
        $this->call(MembersTableSeeder::class);
        $this->call(OthersTableSeeder::class);
        $this->call(PartnersTableSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(BonusSeeder::class);
        $this->call(AddressPoolSeeder::class);
    }
}
