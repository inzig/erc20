<?php

namespace BCES\Console\Commands;

use BCES\Models\CCRate;
use BCES\Models\Setting;
use Illuminate\Console\Command;

class UpdateCCRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:rates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update rates of crypto currency.';

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
     *
     * @return void
     */
    public function handle()
    {
        $ethToATN = Setting::whereName('eth_to_artz_unit')->first()->value;

        $ethRate = json_decode(file_get_contents('https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=USD'), true);
        $data = CCRate::firstOrNew(['type' => 'ethereum']);
        $data->fill([
            'usd' => $ethRate['USD'],
            'btc' => $ethToATN,
            'response' => $ethRate
        ]);
        $data->save();

        $btcRate = json_decode(file_get_contents('https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=ETH,USD'), true);
        $data = CCRate::firstOrNew(['type' => 'bitcoin']);
        $data->fill([
            'usd' => $btcRate['USD'],
            'btc' => $ethToATN * $btcRate['ETH'],
            'response' => $btcRate
        ]);
        $data->save();

        $ltcRate = json_decode(file_get_contents('https://min-api.cryptocompare.com/data/price?fsym=LTC&tsyms=ETH,USD'), true);
        $data = CCRate::firstOrNew(['type' => 'litecoin']);
        $data->fill([
            'usd' => $ltcRate['USD'],
            'btc' => $ethToATN * $ltcRate['ETH'],
            'response' => $ltcRate
        ]);
        $data->save();

        $dashRate = json_decode(file_get_contents('https://min-api.cryptocompare.com/data/price?fsym=DASH&tsyms=ETH,USD'), true);
        $data = CCRate::firstOrNew(['type' => 'dashcoin']);
        $data->fill([
            'usd' => $dashRate['USD'],
            'btc' => $ethToATN * $dashRate['ETH'],
            'response' => $dashRate
        ]);
        $data->save();
    }
}
