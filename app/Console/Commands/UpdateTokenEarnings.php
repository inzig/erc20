<?php

namespace BCES\Console\Commands;

use BCES\Models\User;
use Illuminate\Console\Command;

class UpdateTokenEarnings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:earnings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update latest earnings of admin addresses.';

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
        $ethereum = User::find(1)->icos()->where('type', 'ethereum')->first();

        $result = json_decode(file_get_contents("https://api.ethplorer.io/getAddressInfo/$ethereum->address?apiKey=freekey"),true);
        $raised_eth = $result['ETH']['balance'];
        $eth_usd = preg_replace('/[^a-zA-Z0-9_.]/', '', file_get_contents("http://testing12.gear.host/api/converter?from=ETH&to=USD&amount=$raised_eth"));

        $ethereum->usd = $eth_usd;
        $ethereum->earnings = $raised_eth;
        $ethereum->save();
    }
}
