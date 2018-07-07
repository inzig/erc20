<?php

namespace BCES\Http\Controllers;

use BCES\Models\Referral;

use Illuminate\Http\Request;

class REFController extends Controller
{
    public function __invoke(Request $request)
    {
        $referral = Referral::wherereferral($request->get('referral'))->first();

        if (!$referral) {
            return response()->json(['type' => 'warning', 'same' => true, 'message' => 'Referral  does not exits']);
        } else {
            return response()->json(['type' => 'success', 'same' => false, 'message' => 'Referral is verified']);
        }
    }
}
