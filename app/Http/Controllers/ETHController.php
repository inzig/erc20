<?php

namespace BCES\Http\Controllers;

use BCES\Concerns\ETHValidate;
use BCES\Models\ICO;
use Illuminate\Http\Request;

class ETHController extends Controller
{
    use ETHValidate;

    public function __invoke(Request $request)
    {
//        if ($this->verifyEthereum($request->get('ethwalet')))
//            return response()->json(['type' => 'warning', 'same' => false, 'message' => 'Ethereum address is not valid.']);

        $address = ICO::whereAddress($request->get('ethwalet'))->whereType('ethereum')->first();

        if ($address)
            return response()->json(['type' => 'warning', 'same' => true, 'message' => 'The Ethereum address has already been taken.']);

        return response()->json(['type' => 'success', 'same' => false, 'message' => 'Ethereum address is verified.']);
    }
}
