<?php

namespace BCES\Console\Commands;

use Illuminate\Console\Command;

class CryptoConvertor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crypto:converter {from} {to} {amount}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Return Current Conversion rate of defined Crypto Currency';

    /**
     * CryptoConvertor constructor.
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
        $from = strtoupper($this->argument('from'));
        $to = strtoupper($this->argument('to'));
        $amount = $this->argument('amount');

        $rate = file_get_contents('https://min-api.cryptocompare.com/data/price?fsym=' . $from . '&tsyms=' . $to);

        $decode = json_decode($rate, true);
        $final = $amount * $decode[$to];

        $this->info($final);
    }
}
