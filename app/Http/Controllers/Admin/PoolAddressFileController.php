<?php

namespace BCES\Http\Controllers\Admin;

use BCES\Models\AddressPool;
use BCES\Models\ICO;
use Illuminate\Http\Request;
use BCES\Http\Controllers\Controller;

class PoolAddressFileController extends Controller
{
    /**
     * @param Request $request
     */
    public function index(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $data = collect();
            $keys = collect(['crypto_type', 'address']);

            $content = file_get_contents($request->file('avatar')->getRealPath());
            if (false !== strpos($content, "\r\n"))
                $contentList = explode("\r\n", $content);
            else
                $contentList = explode("\r", $content);

            collect($contentList)->each(function ($row, $i) use ($data, $keys) {
                if ($row && $i != 0) {
                    $rowCollect = explode(',', $row);
                    $rearrange = [];
                    $keys->each(function ($k, $ki) use (&$rearrange, $rowCollect) {
                        if ($ki == 0)
                            $rearrange[$k] = strtoupper($rowCollect[$ki]);
                        else
                            $rearrange[$k] = $rowCollect[$ki];
                    });
                    $data->push($rearrange);
                }
            });

            $data->each(function ($d) {
                $pool = AddressPool::firstOrNew($d);
                if (!$pool->exists)
                    $pool->save();
            });
        }
    }

    /**
     * Allocate pool address to logged in user and check for transactions
     *
     * @param $crypto
     * @return \Illuminate\Http\JsonResponse
     */
    public function allocateAddress($crypto)
    {
        if (\Auth::user()->isAdmin())
            return response()->json(ICO::whereUserId(1)->whereType($crypto)->first());

        if ($crypto == 'ethereum')
            return response()->json(ICO::whereUserId(1)->whereType('ethereum')->first());

        $userPools = \Auth::user()->pools()->whereCryptoType($crypto)->first();

        if (!$userPools) {
            $userPools = AddressPool::whereCryptoType($crypto)->whereNull('user_id')->first();
            $userPools->user()->associate(\Auth::user());
            $userPools->save();
        }

        return response()->json($userPools);
    }
}
