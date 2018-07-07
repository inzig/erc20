<?php

namespace BCES\Concerns;

use BCES\Models\AddressPool;
use BCES\Models\ICO;
use BCES\Models\Reward;
use BCES\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Collection;

trait Transactionable
{
    use ICOBasic;

    /**
     * Addresses from transaction
     *
     * @var array
     */
    protected $addresses;

    /**
     * Fetch all Ethereum transactions
     *
     * https://api.ethplorer.io/getAddressTransactions/0x41e5560054824ea6b0732e656e3ad64e20e94e45?apiKey=freekey&type=transfer&limit=100
     *
     * @param ICO $ICO
     * @return \Illuminate\Support\Collection
     */
    public function fetchFromAddress(ICO $ICO)
    {
        return collect(json_decode(file_get_contents('https://api.ethplorer.io/getAddressTransactions/' . $ICO->address . '?apiKey=' . config('ico.ethplorer') . '&type=transfer&limit=50'), true));
    }

    /**
     * Get ETH to BNE rate from settings
     *
     * @return float
     */
    protected function fetchIcoRate()
    {
        return $this->getICOData()['bneRateDis'];
    }

    /**
     * Process the address and update transactions
     *
     * @param ICO $ICO
     * @return bool
     */
    public function processEthAddress(ICO $ICO)
    {
        $this->info(' fetching ' . $ICO->type . ' transactions ... ');

        $icoTransactions = $this->fetchFromAddress($ICO);

        if ($icoTransactions->has('error')) {
            $ICO->address_errors = $icoTransactions->get('error');
            $ICO->save();

            $this->error(PHP_EOL . ' address has some errors: ' . json_encode($icoTransactions->get('error')) . PHP_EOL);

            return false;
        }

        $icoRate = $this->fetchIcoRate();
        $refDiscount = Setting::whereName('referral_discount')->first()->value;
        $ccRate = $this->convertTo('ETH');
        $this->info(' processing transactions ' . PHP_EOL);
        $bar = $this->output->createProgressBar($icoTransactions->count());

        $icoTransactions->each(function ($trans) use ($ICO, $icoRate, $bar, $ccRate, $refDiscount) {

            $oldTrans = $ICO->allTrans()->where('hash', $trans['hash'])->first();

            if (!$oldTrans) {
                $transData = $trans;

                $transData['amount'] = $trans['value'];
                $transData['currency'] = $ICO->type;
                $transData['completed'] = $trans['success'];
                $transData['input_data'] = $trans['input'];
                $transData['updated_when'] = Carbon::createFromTimestamp($trans['timestamp']);

                $oldTrans = $ICO->allTrans()->create($transData);
            }

            if (!$oldTrans->processed) {
                $userAddress = ICO::whereAddress($oldTrans->from)->whereType($ICO->type)->where('user_id', '!=', 1)->with('user')->first();

                if ($userAddress && $userAddress->user && !$userAddress->user->isAdmin()) {

                    if ($userAddress->user->runcpa)
                        @file_get_contents('https://runcpa.com/callbacks/events/revenue-partner/Orhlld3ElxXgLofprmUhQfvOMA_0IzSO/rs22026/' . $userAddress->user->runcpa . '/' . ($oldTrans->amount * $ccRate['BTC']));

                    if ($userAddress->user->cryptocpa) {
                        if ($userAddress->user->history()->count())
                            @file_get_contents('https://servedbytrackingdesk.com/59ef2cb10433cc60380e1f1e/a.gif?anid=5a2ada1438ecff2172bdb6b7&oid=5a2ada3338ecff2172bdb6bb&c=3&h=' . $userAddress->user->cryptocpa . '&a=' . ($oldTrans->amount * $ccRate['USD']) . '&_tdhop=1');
                        else
                            @file_get_contents('https://servedbytrackingdesk.com/59ef2cb10433cc60380e1f1e/a.gif?anid=5a2ada1438ecff2172bdb6b7&oid=5a2ada3338ecff2172bdb6bb&c=2&h=' . $userAddress->user->cryptocpa . '&a=' . ($oldTrans->amount * $ccRate['USD']) . '&_tdhop=1');
                    }

                    $history = $userAddress->user->history()->create([
                        'bnes' => $oldTrans->amount * $icoRate,
                        'balance' => $oldTrans->amount,
                        'currency' => strtoupper($ICO->type),
                        'unique_value' => $oldTrans->hash,
                        'address' => $oldTrans->from,
                        'completed' => $oldTrans->completed,
                        'is_approved' => Carbon::now()
                    ]);

                    $referrer = $userAddress->user->referrer;
                    if ($referrer->count()) {
                        $reward = Reward::newModelInstance([
                            'bnes' => $history->bnes * ($refDiscount / 100)
                        ]);

                        $reward->user()->associate($referrer->first()->user);
                        $reward->referral()->associate($referrer->first());
                        $reward->transaction()->associate($history);

                        $reward->save();
                    }

                    $oldTrans->processed = true;
                    $oldTrans->save();
                }
            }

            $bar->advance();
        });

        $bar->finish();
        $this->info(PHP_EOL . PHP_EOL . ' process finished ' . PHP_EOL);

        return true;
    }

    /**
     * Process pool addresses of users
     *
     * @param $slug
     * @param $type
     */
    public function processNotEthAddress($slug, $type)
    {
        $icoRate = $this->fetchIcoRate();
        $ccRate = $this->convertTo($slug);
        $poolRate = $this->convertToEth($slug);
        $refDiscount = Setting::whereName('referral_discount')->first()->value;
        AddressPool::whereNotNull('user_id')->where(\DB::raw('LOWER(`crypto_type`)'), 'LIKE', '%' . strtolower($type) . '%')->chunk(5, function ($pools) use ($refDiscount, $slug, $icoRate, $type, $poolRate, $ccRate) {

            $this->info(PHP_EOL . ' fetching ' . join(';', $pools->map(function ($pool) {
                    return trim($pool->address);
                })->toArray()) . ' transactions ... ' . PHP_EOL . PHP_EOL);

            $icoTransactions = collect(json_decode(file_get_contents('https://api.blockcypher.com/v1/' . $slug . '/main/addrs/' . join(';', $pools->map(function ($pool) {
                    return trim($pool->address);
                })->toArray()) . '/full?limit=50&token=' . config('ico.blockcypher')), true));

            if ($icoTransactions->has('error'))
                $this->error(PHP_EOL . ' address has some errors: ' . $icoTransactions->get('error') . PHP_EOL);

            if ($pools->count() == 1)
                $this->processCollectData(collect($icoTransactions->get('txs')), $pools->first(), $icoRate, $slug, $type, $poolRate, $ccRate, $refDiscount);
            else
                $icoTransactions->each(function ($addTrans) use ($pools, $icoRate, $slug, $type, $poolRate, $ccRate, $refDiscount) {
                    $icoTransactions = collect($addTrans);

                    if ($icoTransactions->has('error'))
                        $this->error(PHP_EOL . ' address has some errors: ' . $icoTransactions->get('error') . PHP_EOL);
                    else
                        $this->processCollectData(collect($icoTransactions->get('txs')), $pools->where('address', $icoTransactions->get('address'))->first(), $icoRate, $slug, $type, $poolRate, $ccRate, $refDiscount);
                });
        });
    }

    /**
     * Process transaction for pool address
     *
     * @param Collection $txses
     * @param AddressPool $inProcess
     * @param $icoRate
     * @param $slug
     * @param $type
     * @param $poolRate
     * @param $ccRate
     * @param $refDiscount
     */
    public function processCollectData(Collection $txses, AddressPool $inProcess, $icoRate, $slug, $type, $poolRate, $ccRate, $refDiscount)
    {
        $this->info(PHP_EOL . ' process of txs started for ' . $inProcess->address . PHP_EOL);

        $bar = $this->output->createProgressBar($txses->count());
        $txses->each(function ($txs) use ($inProcess, $icoRate, $slug, $bar, $type, $poolRate, $ccRate, $refDiscount) {

            $amount = $this->fetchAmount($txs, $inProcess);

            $oldTrans = $inProcess->allTrans()->where('from', json_encode($this->addresses))->where('hash', $txs['hash'])->where('input_data', $txs['inputs'][0]['age'])->first();

            if (!$oldTrans) {
                $transData = [
                    'to' => $inProcess->address,
                    'hash' => $txs['hash'],
                    'from' => $this->addresses,
                    'currency' => $type
                ];

                $transData['amount'] = $amount;
                $transData['completed'] = isset($txs['confidence']) ? $txs['confidence'] : 0;
                $transData['input_data'] = $txs['inputs'][0]['age'];
                $transData['updated_when'] = isset($txs['confirmed']) ? Carbon::parse($txs['confirmed']) : Carbon::parse($txs['received']);

                $oldTrans = $inProcess->allTrans()->create($transData);
            }

            if (!$oldTrans->processed && $inProcess->user) {

                if ($inProcess->user->runcpa)
                    @file_get_contents('https://runcpa.com/callbacks/events/revenue-partner/Orhlld3ElxXgLofprmUhQfvOMA_0IzSO/rs22026/' . $inProcess->user->runcpa . '/' . ($oldTrans->amount * $ccRate['BTC']));

                if ($inProcess->user->cryptocpa) {
                    if ($inProcess->user->history()->count())
                        @file_get_contents('https://servedbytrackingdesk.com/59ef2cb10433cc60380e1f1e/a.gif?anid=5a2ada1438ecff2172bdb6b7&oid=5a2ada3338ecff2172bdb6bb&c=3&h=' . $inProcess->user->cryptocpa . '&a=' . ($oldTrans->amount * $ccRate['USD']) . '&_tdhop=1');
                    else
                        @file_get_contents('https://servedbytrackingdesk.com/59ef2cb10433cc60380e1f1e/a.gif?anid=5a2ada1438ecff2172bdb6b7&oid=5a2ada3338ecff2172bdb6bb&c=2&h=' . $inProcess->user->cryptocpa . '&a=' . ($oldTrans->amount * $ccRate['USD']) . '&_tdhop=1');
                }

                $history = $inProcess->user->history()->create([
                    'bnes' => (($poolRate * $oldTrans->amount) * $icoRate),
                    'balance' => $oldTrans->amount,
                    'currency' => strtoupper($inProcess->crypto_type),
                    'unique_value' => $oldTrans->hash,
                    'address' => $oldTrans->from,
                    'completed' => $oldTrans->completed
                ]);

                $referrer = $inProcess->user->referrer;
                if ($referrer->count()) {
                    $reward = Reward::newModelInstance([
                        'bnes' => $history->bnes * ($refDiscount / 100)
                    ]);

                    $reward->user()->associate($referrer->first()->user);
                    $reward->referral()->associate($referrer->first());
                    $reward->transaction()->associate($history);

                    $reward->save();
                }

                $oldTrans->processed = true;
                $oldTrans->save();
            }

            $bar->advance();
        });

        $bar->finish();

        $this->info(PHP_EOL . PHP_EOL . ' txs finished for ' . $inProcess->address . PHP_EOL);
    }

    /**
     * Get amount for user
     *
     * @param $txs
     * @param $ico
     * @return int
     */
    public function fetchAmount($txs, $ico)
    {
        $amount = 0;

        $payedTrans = collect($txs['outputs']); //->where('script_type', 'pay-to-script-hash');

        $payedTrans->each(function ($output) use (&$amount, $ico, $txs) {
            foreach ($output['addresses'] as $address) {
                if ($ico->address == $address) {
                    $amount = $output['value'] / 100000000;
                    break;
                }
            }
        });

        if ($amount == 0 && isset($txs['next_outputs']))
            $amount = $this->fetchAmount(json_decode(file_get_contents($txs['next_outputs'] . '&token=' . config('app.blockcypher')), true), $ico);

        if ($amount > 0) {
            $addresses = [];
            foreach ($txs['inputs'] as $input) {
                $addresses = array_merge($input['addresses'], $addresses);
            }
            $this->addresses = array_unique($addresses);
        }

        return $amount;
    }
}
