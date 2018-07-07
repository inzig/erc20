<?php

namespace BCES\Concerns;

use BCES\Models\AllTransaction;
use BCES\Models\CCRate;
use BCES\Models\ICO;
use BCES\Models\ICOBonus;
use BCES\Models\Setting;
use BCES\Models\TransactionHistory;
use Carbon\Carbon;

trait ICOBasic
{
    /**
     * Get current state of ICO
     *
     * @return array
     */


    public function getICOData()
    {
        $current = Carbon::now();
        $bonuses = ICOBonus::all();

        $ethAddress = ICO::whereUserId(1)->where('type', 'ethereum')->first();

        $dates = $this->getDatesForTimer($ethAddress);

        $labels = $this->getLabelsForTimer();

        if ($current->lt($ethAddress->pre_sale_at)) {

            $index = 0;
            $discount = 0;
            $title = (string)trans('welcome.PRESALE_STARTS_IN');

        } else if ($current->gte($ethAddress->pre_sale_at) && $current->lt($ethAddress->pre_sale_end_at)) {
            $index = 1;
            $title = (string)trans('welcome.PRESALE_ENDS_IN');
            $discount = $bonuses->where('type', 'Pre Sale')->first()->discount;

        } else if ($current->gte($ethAddress->pre_sale_end_at) && $current->lt($ethAddress->pre_ico_at)) {
            $index = 2;
            $title = (string)trans('welcome.PREICO_SALE_IN');
            $discount = 0;

        }
         else if ($current->gte($ethAddress->pre_ico_at) && $current->lt($ethAddress->pre_ico_end_at)){
            $index = 3;
            $title = (string)trans('welcome.PREIC0_ENDS_IN');
             $discount = $bonuses->where('type', 'Pre ICO')->first()->discount;
        }
        else if($current->gte($ethAddress->pre_ico_end_at) && $current->lt($ethAddress->main_ico_at)){
            $index = 4;
            $title = (string)trans('welcome.PREIC0_ENDS_IN');
             $discount = 0;
        }
        else if ($current->gte($ethAddress->main_ico_at) && $current->lt($ethAddress->ico_expire_at)) {
            $index = 5;
            $title = (string)trans('welcome.SALE_ENDS_IN');
            $bonus = $bonuses->where('week', $ethAddress->main_ico_at->diffInWeeks(Carbon::now()) + 1)->first();
            $discount = $bonus ? $bonus->discount : $bonuses->where('type', 'Remaining days')->first()->discount;
        } else {
            $index = 6;
            $discount = 0;
            $title = (string)trans('welcome.SALE_ENDS');
        }

        $bneRate = Setting::whereName('eth_to_artz_unit')->first()->value;
        $bneRateDis = $bneRate * (1 + ($discount / 100));

        $rates = CCRate::all();
        $increments = Setting::where('name', 'like', '%increment%')->get();

        $totalEthAmtAll = AllTransaction::whereCurrency('ethereum')->where('processed', 0)->sum('amount');
        $totalEthAmtTH = TransactionHistory::whereCurrency('ETHEREUM')->sum('balance');
        $incrEth = (float)$increments->where('name', 'increment_ethereum')->first()->value;
        $rateEth = $rates->where('type', 'ethereum')->first();
        $ethAddress->earnings = $totalEthAmtAll + $totalEthAmtTH + $incrEth;
        $ethAddress->usd = ($totalEthAmtAll + $totalEthAmtTH + $incrEth) * $rateEth->usd;

        $totalBtcAmtAll = AllTransaction::whereCurrency('bitcoin')->where('processed', 0)->sum('amount');
        $totalBtcAmtTH = TransactionHistory::whereCurrency('BITCOIN')->sum('balance');
        $incrBtc = (float)$increments->where('name', 'increment_bitcoin')->first()->value;
        $rateBtc = $rates->where('type', 'bitcoin')->first();
        $btcAddress = (object)['earnings' => ($totalBtcAmtAll + $totalBtcAmtTH + $incrBtc), 'usd' => ($totalBtcAmtAll + $totalBtcAmtTH + $incrBtc) * $rateBtc->usd];

        $totalLtcAmtAll = AllTransaction::whereCurrency('litecoin')->where('processed', 0)->sum('amount');
        $totalLtcAmtTH = TransactionHistory::whereCurrency('LITECOIN')->sum('balance');
        $incrLtc = (float)$increments->where('name', 'increment_litecoin')->first()->value;
        $rateLtc = $rates->where('type', 'litecoin')->first();
        $ltcAddress = (object)['earnings' => ($totalLtcAmtAll + $totalLtcAmtTH + $incrLtc), 'usd' => ($totalLtcAmtAll + $totalLtcAmtTH + $incrLtc) * $rateLtc->usd];

        $totalDshAmtAll = AllTransaction::whereCurrency('dashcoin')->where('processed', 0)->sum('amount');
        $totalDshAmtTH = TransactionHistory::whereCurrency('DASHCOIN')->sum('balance');
        $incrDash = (float)$increments->where('name', 'increment_dashcoin')->first()->value;
        $rateDash = $rates->where('type', 'dashcoin')->first();
        $dshAddress = (object)['earnings' => ($totalDshAmtAll + $totalDshAmtTH + $incrDash), 'usd' => ($totalDshAmtAll + $totalDshAmtTH + $incrDash) * $rateDash->usd];

        $totalBNE = (($ethAddress->earnings * $rateEth->btc) + ($btcAddress->earnings * $rateBtc->btc) + ($ltcAddress->earnings * $rateLtc->btc) + ($dshAddress->earnings * $rateDash->btc));
        $totalInvestedEth = ($ethAddress->earnings + ($btcAddress->earnings * ($rateBtc->btc / $bneRate)) + ($ltcAddress->earnings * ($rateLtc->btc / $bneRate)) + ($dshAddress->earnings * ($rateDash->btc / $bneRate)));
        $bar = ($totalBNE / $ethAddress->hard_cap) * 100;

        return compact('bar', 'bneRate', 'bneRateDis', 'ethAddress', 'btcAddress', 'ltcAddress', 'dshAddress', 'dates', 'labels', 'index', 'title', 'address', 'discount', 'totalBNE', 'totalInvestedEth');
    }

    /**
     * Get labels for frontend timer
     *
     * @return array
     */
    protected function getLabelsForTimer()
    {
        return [
            (string)trans('welcome.PRESALE_STARTS_IN'),
            (string)trans('welcome.PRESALE_ENDS_IN'),
            (string)trans('welcome.PREICO_SALE_IN'),
            (string)trans('welcome.PREIC0_ENDS_IN'),
            (string)trans('welcome.SALE_STARTS_IN'),
            (string)trans('welcome.SALE_ENDS_IN'),
            (string)trans('welcome.SALE_ENDS')
        ];
    }



    /**
     * Get dates for frontend timer
     *
     * @param ICO $ethAddress
     * @return array
     */
    protected function getDatesForTimer(ICO $ethAddress)
    {
        return [

            [$ethAddress->pre_sale_at->year, $ethAddress->pre_sale_at->month - 1, $ethAddress->pre_sale_at->day, $ethAddress->pre_sale_at->hour, $ethAddress->pre_sale_at->minute, $ethAddress->pre_sale_at->second],
            [$ethAddress->pre_sale_end_at->year, $ethAddress->pre_sale_end_at->month - 1, $ethAddress->pre_sale_end_at->day, $ethAddress->pre_sale_end_at->hour, $ethAddress->pre_sale_end_at->minute, $ethAddress->pre_sale_end_at->second],

            [$ethAddress->pre_ico_at->year, $ethAddress->pre_ico_at->month - 1, $ethAddress->pre_ico_at->day, $ethAddress->pre_ico_at->hour, $ethAddress->pre_ico_at->minute, $ethAddress->pre_ico_at->second],
            [$ethAddress->pre_ico_end_at->year, $ethAddress->pre_ico_end_at->month - 1, $ethAddress->pre_ico_end_at->day, $ethAddress->pre_ico_end_at->hour, $ethAddress->pre_ico_end_at->minute, $ethAddress->pre_ico_end_at->second],
            [$ethAddress->main_ico_at->year, $ethAddress->main_ico_at->month - 1, $ethAddress->main_ico_at->day, $ethAddress->main_ico_at->hour, $ethAddress->main_ico_at->minute, $ethAddress->main_ico_at->second],
            [$ethAddress->ico_expire_at->year, $ethAddress->ico_expire_at->month - 1, $ethAddress->ico_expire_at->day, $ethAddress->ico_expire_at->hour, $ethAddress->ico_expire_at->minute, $ethAddress->ico_expire_at->second],
            ''
        ];
    }

    /**
     * Get latest balance and return Ethereum rates
     *
     * @param $from
     * @return double
     */
    public function convertToEth($from)
    {
        return json_decode(file_get_contents('https://min-api.cryptocompare.com/data/price?fsym=' . strtoupper($from) . '&tsyms=ETH'), true)['ETH'];
    }

    /**
     * Get latest balance and return rates
     *
     * @param $from
     * @return double
     */
    public function convertTo($from)
    {
        return json_decode(file_get_contents('https://min-api.cryptocompare.com/data/price?fsym=' . strtoupper($from) . '&tsyms=BTC,USD'), true);
    }
}