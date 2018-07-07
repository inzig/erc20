<?php

namespace BCES\Http\Controllers\Admin;

use BCES\Models\AllTransaction;
use BCES\Models\TransactionHistory;
use Carbon\Carbon;
use BCES\Models\Setting;
use Illuminate\Http\Request;
use BCES\Http\Controllers\Controller;

class TransactionsController extends Controller
{
    public function index($type)
    {
        return view('admin.transactions.index', compact('type'));
    }

    public function manualIndex()
    {
        return view('admin.transactions.manual');
    }

    public function getListing(Request $request, $type)
    {
        $data = collect();
        $draw = $request->get('draw');

        if ($type == 'unknown')
            $builder = AllTransaction::whereProcessed(0);
        else {
            $builder = TransactionHistory::query();
            $builder->whereNotNull('is_approved');
            $builder->select(['transaction_histories.created_at', 'users.name', 'users.email', 'transaction_histories.currency', 'transaction_histories.balance', 'transaction_histories.bnes']);
            $builder->leftJoin('users', 'users.id', '=', 'transaction_histories.user_id');
        }

        $recordsFiltered = $recordsTotal = $builder->count();

        $builder->offset($request->start);
        $builder->limit($request->length);

        $builder->get()->each(function ($trans) use ($data, $type) {
            if ($type == 'known')
                $data->push([
                    $trans->created_at->format('H:i d/m/Y'),
                    $trans->email,
                    $trans->name,
                    $trans->currency,
                    $trans->balance,
                    $trans->bnes,
                ]);
            else
                $data->push([
                    $trans->updated_when->format('H:i d/m/Y'),
                    $trans->from,
                    $trans->to,
                    $trans->currency,
                    $trans->amount,
                ]);
        });

        return response()->json(compact('data', 'draw', 'recordsTotal', 'recordsFiltered'));
    }

    public function getManualListing(Request $request)
    {
        $data = collect();
        $draw = $request->get('draw');

        $builder = TransactionHistory::query();

        $builder->select(['transaction_histories.id', 'transaction_histories.address', 'initial_coin_offerings.address as eth_address', 'transaction_histories.currency', 'transaction_histories.balance', 'transaction_histories.updated_at', 'transaction_histories.bnes', 'users.name', 'users.email']);

        $builder->leftJoin('users', 'users.id', '=', 'transaction_histories.user_id');
        $builder->leftJoin('initial_coin_offerings', 'initial_coin_offerings.user_id', '=', 'transaction_histories.user_id');

        $builder->whereNull('is_approved');
        $builder->where('initial_coin_offerings.type', 'ethereum');

        $recordsFiltered = $recordsTotal = $builder->count();

        $builder->offset($request->start);
        $builder->limit($request->length);

        $builder->get()->each(function ($trans) use ($data) {
            $data->push([
                $trans->updated_at->format('H:i d/m/Y'),
                $trans->name,
                $trans->email,
                $trans->address,
                $trans->eth_address,
                $trans->currency,
                $trans->balance,
                $trans->bnes,
                '<button class="btn btn-approve btn-xs green" type="button" data-loading-text="<span class=&quot;fa fa-spin fa-repeat&quot;></span> approving" data-url="' . (route('admin.manual.update', $trans->id)) . '"><i class="fa fa-check"></i> approve</button>',
            ]);
        });

        return response()->json(compact('data', 'draw', 'recordsTotal', 'recordsFiltered'));
    }

    public function approveManualListing($id)
    {
        $transaction = TransactionHistory::findOrFail($id);

        $transaction->is_approved = Carbon::now();
        $transaction->save();

        return response()->json($transaction);
    }
}
