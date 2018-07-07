<?php

namespace BCES\Http\Controllers\Auth;

use BCES\Concerns\RunCpa;
use BCES\Models\Referral;
use BCES\Models\User;
use BCES\Http\Controllers\Controller;
use BCES\Notifications\RegisteredUser;
use BCES\Rules\AlphaSpace;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        if (!$request->has('terms') || $request->get('terms') != '1')
            return back()->with('error', 'Please accept our terms and conditions.');

        if ($request->get('referral') && !($referral = Referral::whereReferral($request->get('referral'))->first()))
            return back()->with('error', 'Referral code is invalid.');

        $this->validate($request, [
            'name' => ['required', 'max:255', new AlphaSpace],
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|confirmed|string|min:6',
            'ethwalet' => 'required|min:42|unique:initial_coin_offerings,address',
        ]);

        $user = User::newModelInstance($request->except(['avatar', 'password', 'activated']));
        $user->password = bcrypt($request->get('password'));

        if (isset($_COOKIE['run_cpa_track_id']))
            $user->runcpa = $_COOKIE['run_cpa_track_id'];

        if (isset($_COOKIE['cryptocpa_click_id']))
            $user->cryptocpa = $_COOKIE['cryptocpa_click_id'];

        $user->save();

        if (isset($referral) && $referral)
            \DB::table('referral_mapping')->insert(['user_id' => $user->id, 'referral_id' => $referral->id]);

        return $this->registered($request->get('ethwalet'), $user);
    }

    /**
     * The user has been registered.
     *
     * @param string $ethwalet
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    protected function registered($ethwalet, $user)
    {
        $ico = $user->icos()->create([
            'type' => 'ethereum',
            'address' => $ethwalet
        ]);

        $activation = $user->activation()->create([
            'token' => hash_hmac('sha256', str_random(), config('app.key'))
        ]);

        $user->referral()->create([
            'referral' => str_random()
        ]);

        $user->notify(new RegisteredUser($activation, $ico));

        // send RunCap to verify that user is registered
        RunCpa::getInstance()->generateConversion('cpl29683');

        if ($user->cryptocpa)
            @file_get_contents('https://servedbytrackingdesk.com/59ef2cb10433cc60380e1f1e/a.gif?anid=5a2ada1438ecff2172bdb6b7&oid=5a2ada3338ecff2172bdb6bb&c=1&h=' . $user->cryptocpa . '&_tdhop=1');

        return redirect()->route('auth.fallback')->with('status', 'Account successfully created. We have sent you an email to activate your ' . config('app.name') . ' account.');
    }
}
