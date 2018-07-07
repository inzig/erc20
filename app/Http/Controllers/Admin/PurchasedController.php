<?php

namespace BCES\Http\Controllers\Admin;

use BCES\Models\Setting;
use BCES\Models\User;
use BCES\Http\Controllers\Controller;

class PurchasedController extends Controller
{
    /**
     * Show the application's admin dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (Setting::whereName('payment_disabled')->first()->value == 'yes')
            return redirect()->route('dashboard.index')->with('warning', 'Token sale has not started.');
/*
        $verified = \Auth::user()->kyc;

        if (!$verified)
            return redirect()->route('dashboard.index')->with('warning', 'Please fill your KYC form so admin can approve.');

        if (!$verified->verified)
            return redirect()->route('dashboard.index')->with('warning', 'Admin has not yet approve your KYC. Please contact support.');
*/

        $tokens = User::find(1)->icos()->whereActive(1)->get();

        return view('dashboard.purchased-jpg', compact('tokens'));
    }

    /**
     * Show the application's admin dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function referral()
    {
        return view('dashboard.referral');
    }


    /**
     * Show the application's admin dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function calculator()
    {
        return view('dashboard.calculator');
    }

    /**
     * Show the application's admin dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function history()
    {
        return view('dashboard.history');
    }

    /**
     * Show the application's admin dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function settings()
    {
        return view('dashboard.settings');
    }
}
