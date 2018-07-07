<?php

namespace BCES\Http\Controllers\API;

use BCES\Http\Requests\UserForm;
use BCES\Models\KnowYourCustomer;
use BCES\Models\User;
use BCES\Notifications\KYCNotification;
use BCES\Rules\AlphaSpace;
use Illuminate\Http\Request;
use BCES\Http\Controllers\Controller;

class UserController extends Controller
{
    public function profile(UserForm $request)
    {
        $this->validate($request, [
            'name' => ['required', new AlphaSpace]
        ]);

        $user = \Auth::user();

        $data = $request->except(['email', 'password', 'avatar']);

        if (count($data))
            $user->fill($data);

        if ($request->hasFile('avatar'))
            $user->avatar = 'storage' . str_replace('public', '', $request->file('avatar')->store('public/avatars'));

        $user->save();

        return redirect()->back()->with(['profile' => 'Your profile is updated successfully.']);
    }

    public function password(Request $request)
    {
        $this->validate($request, [
            'current' => 'required|string',
            'password' => 'required|confirmed',
        ]);

        $user = \Auth::user();

        if (!app('hash')->check($request->get('current'), $user->password))
            return response()->json(['errors' => ['current' => ['Your current password is invalid.']]], 422);

        $user->password = bcrypt($request->get('password'));

        $user->save();

        return redirect()->back()->with(['status' => 'Your profile\'s password is updated successfully.']);
    }

    public function oauth(Request $request)
    {
        $this->validate($request, [
            'oauth' => 'required|boolean'
        ]);

        $user = \Auth::user();
        $user->oauth = $request->get('oauth');
        $user->save();

        return response()->json(['type' => $user->oauth ? 'success' : 'warning', 'message' => 'Email confirmation is <b>' . ($user->oauth ? 'on' : 'off') . '</b> when logging in.']);
    }

    public function uploadKYC(Request $request)
    {
        $Kyc = \Auth::user()->kyc;

        if (!$Kyc) {
            $Kyc = \Auth::user()->kyc()->create($request->all());
            User::find(1)->notify(new KYCNotification($Kyc));
        } else {

            $Kyc->fill($request->all());
            $Kyc->save();
        }

        return response()->json(['status' => 'KYC added, Now admin will verify and send you tokens when we find transaction from Blockchain.', 'form' => $Kyc]);
    }
}
