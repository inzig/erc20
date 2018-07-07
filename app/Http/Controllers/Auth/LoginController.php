<?php

namespace BCES\Http\Controllers\Auth;

use BCES\Http\Controllers\Controller;
use BCES\Models\Activation;
use BCES\Notifications\LoginEmailNotify;
use BCES\Notifications\ResendVerificationEmail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard/home';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        $user = $this->guard()->user();

        if ($user->isAdmin())
            return redirect()->route('admin.index');
        else if (!$user->oauth && $user->activated)
            return redirect()->route('dashboard.index');

        auth()->logout();

        $activation = $user->activation;

        if ($activation) {
            $activation->token = hash_hmac('sha256', str_random(), config('app.key'));
            $activation->save();
        } else
            $activation = $user->activation()->create([
                'token' => hash_hmac('sha256', str_random(), config('app.key'))
            ]);

        if (!$user->activated) {
            $user->notify(new ResendVerificationEmail($activation));

            return redirect()->route('auth.fallback')->with('status', 'Your account has not been activated yet. We have just sent you another verification email.');
        }

        $user->notify(new LoginEmailNotify($activation));

        return redirect()->route('auth.fallback')->with('status', 'We have send you email for login. Please go to dashboard using your email inbox.');
    }

    /**
     * Activate the user and redirect to dashboard
     *
     * @param $token
     * @return \Illuminate\Http\RedirectResponse
     */
    public function activateUser($token)
    {
        $activation = Activation::whereToken($token)->first();

        if (!$activation) abort(404);

        $user = $activation->user;
        $user->activated = true;
        $user->save();

        auth()->login($user);

        $activation->delete();

        return redirect()->route('dashboard.index');
    }
}
