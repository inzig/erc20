<?php

namespace BCES\Console\Commands;

use BCES\Concerns\Transactionable;
use BCES\Models\ICO;
use Illuminate\Console\Command;

class UpdateEthereumTransactions extends Command
{
    use Transactionable;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transactions:ethereum';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update transactions of members and ICO\'s Ethereum address.';

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
        $this->processEthAddress(ICO::whereUserId(1)->whereType('ethereum')->first());
    }
}
