<?php

use Illuminate\Database\Seeder;

class AddressPoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \BCES\Models\AddressPool::create([
            'address' => '1Lgox8Fx1HVAteZfuw2a1FvYv9ikNHX8v6',
            'crypto_type' => 'BITCOIN'
        ]);

        \BCES\Models\AddressPool::create([
            'address' => '36f9dsGq4sw1xy44ZAuMQ1AAiAyHZxBagF',
            'crypto_type' => 'BITCOIN'
        ]);

        \BCES\Models\AddressPool::create([
            'address' => 'LQFF2FnQcL3oKnVdJhwrUae6k2CWCygGD3',
            'crypto_type' => 'LITECOIN'
        ]);

        \BCES\Models\AddressPool::create([
            'address' => 'La2jpLSpdpLCTQDa4E2ARpzx2oo2tPKg5U',
            'crypto_type' => 'LITECOIN'
        ]);

        \BCES\Models\AddressPool::create([
            'address' => '7ajQxAsGFmpPt4aK3KizTTRYkPjiFzuXPz',
            'crypto_type' => 'DASHCOIN'
        ]);

        \BCES\Models\AddressPool::create([
            'address' => '7fmeStFN8M1CJfe3peVacLn7Fe7KfRymJZ',
            'crypto_type' => 'DASHCOIN'
        ]);
    }
}
