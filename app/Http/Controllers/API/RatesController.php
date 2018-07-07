<?php

namespace BCES\Http\Controllers\API;

use BCES\Concerns\ICOBasic;
use BCES\Models\CCRate;
use BCES\Models\Setting;
use Illuminate\Http\Request;
use BCES\Http\Controllers\Controller;

class RatesController extends Controller
{
    use ICOBasic;

    public function index(Request $request)
    {
        $bitcoin = CCRate::whereType('bitcoin')->first();
        $ethereum = CCRate::whereType('ethereum')->first();

        return response()->json(join(' ', [
            '1 ETH = ',
            $ethereum->response->get('price_btc'),
            ' BTC, 1 ETH = ',
            $ethereum->response->get('price_usd'),
            ' USD, 1 BTC = ',
            $bitcoin->response->get('price_usd'),
            'USD'
        ]));
    }

    public function kyc()
    {
        $kyc = auth()->user()->kyc;

        if ($kyc) $kyc->document = '/' . trim($kyc->document, '/');

        return response()->json(['countries' => config('countries'), 'form' => $kyc]);
    }

    public function purchaseConfig()
    {
        return response()->json(array_merge($this->getICOData(), ['kyc_limit' => Setting::whereName('kyc_limit')->first()->value, 'countries' => config('countries')]));
    }
}
