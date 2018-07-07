<?php

namespace BCES\Http\Controllers\Admin;

use BCES\Concerns\ETHValidate;
use BCES\Models\ICO;
use Carbon\Carbon;
use Illuminate\Http\Request;
use BCES\Http\Controllers\Controller;

class ProfileController extends Controller
{
    use ETHValidate;

    /**
     * Show the application's admin dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $ethereum = \Auth::user()->icos()->where('type', 'ethereum')->first();

        return view('dashboard.profile', compact('ethereum'));
    }

    /**
     * Update user profile
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'type' => 'required|string',
            'address' => 'required|string',
        ]);

        $user = \Auth::user();
        $address = $request->get('address');

//        if ($request->get('type') == 'ethereum' && $this->verifyEthereum($address))
//            return response()->json(['errors' => ['address' => 'Invalid Address']], 422);

        $address = $user->icos()->where('type', $request->get('type'))->first();

        if ($address->updated_once)
            return response()->json(['type' => 'warning', 'updated' => true, 'message' => ucfirst($request->get('type')) . ' address has been already updated.']);
        else if ($address->address == $request->get('address'))
            return response()->json(['type' => 'success', 'updated' => false, 'message' => ucfirst($request->get('type')) . ' address is the same.']);
        else {
            if (ICO::whereAddress($request->get('address'))->whereType($request->get('type'))->count())
                return response()->json(['type' => 'warning', 'same' => true, 'message' => 'The ' . ucfirst($request->get('type')) . ' address has already been taken.']);

            if (!$user->isAdmin()) $address->updated_once = Carbon::now();
            $address->address = $request->get('address');
            $address->save();

            return response()->json(['type' => 'success', 'updated' => !$user->isAdmin(), 'message' => ucfirst($request->get('type')) . ' address has been updated.']);
        }
    }
}
