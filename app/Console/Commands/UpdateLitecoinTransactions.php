<?php

namespace BCES\Console\Commands;

use BCES\Concerns\Transactionable;
use Illuminate\Console\Command;

class UpdateLitecoinTransactions extends Command
{
    use Transactionable;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transactions:litecoin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update transactions of members and ICO\'s Litecoin addresses and send to admin for approval.';

    /**
     * Create a new command instance.
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
        $this->processNotEthAddress('ltc', 'litecoin');
    }
}
