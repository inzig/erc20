<?php

namespace BCES\Http\Controllers\admin;

use BCES\Models\Reward;
use Carbon\Carbon;
use Illuminate\Http\Request;
use BCES\Http\Controllers\Controller;

class ReferralController extends Controller
{
    /**
     * Load referral amount
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.referral.index');
    }

    /**
     * Get list of referral award bnes list
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTransactions(Request $request)
    {
        $data = collect();
        $draw = $request->get('draw');

        $builder = Reward::whereNull('is_approved');

        $recordsFiltered = $recordsTotal = $builder->count();

        $builder->with('user');

        $builder->offset($request->start);
        $builder->limit($request->length);

        $builder->get()->each(function ($trans) use ($data) {
            $data->push([
                $trans->created_at->format('H:i d/m/Y'),
                $trans->user->name,
                $trans->user->email,
                $trans->bnes,
                '<button class="btn btn-approve btn-xs green" type="button" data-loading-text="<span class=&quot;fa fa-spin fa-repeat&quot;></span> approving" data-url="' . (route('admin.referral.update', $trans->id)) . '"><i class="fa fa-check"></i> approve</button>',
            ]);
        });

        return response()->json(compact('data', 'draw', 'recordsTotal', 'recordsFiltered'));
    }

    /**
     * Approve transaction for reward
     *
     * @param Reward $reward
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Reward $reward)
    {
        $reward->is_approved = Carbon::now();
        $reward->save();

        return response()->json($reward);
    }
}
