<?php

namespace BCES\Http\Controllers\Admin;

use BCES\Models\KnowYourCustomer;
use BCES\Notifications\KYCVerified;
use Illuminate\Http\Request;
use BCES\Http\Controllers\Controller;

class KycController extends Controller
{
    /**
     * Show the application's admin dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.kyc.index');
    }

    /**
     * Show the application's admin dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function kyc()
    {
        return view('dashboard.kyc');
    }

    /**
     * Show the application's admin kyc list
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function kycList(Request $request)
    {
        $draw = (int)$request->get('draw');
        $data = collect([]);

        $kycs = KnowYourCustomer::query();

        $columns = ['first_name', 'middle_name', 'last_name', 'country', 'city', 'state'];

        if ($request->order[0]['column'] < 5)
            $kycs->orderBy($columns[$request->order[0]['column']], $request->order[0]['dir']);

        $kycs->offset($request->start);
        $kycs->limit($request->length);

        $recordsTotal = $recordsFiltered = $kycs->count();

        $kycs = $kycs->get();

        $kycs->each(function ($kyc) use ($data) {
            $data->push([
                $kyc->first_name . " " . $kyc->middle_name . " " . $kyc->last_name,
                $kyc->country,
                $kyc->city,
                $kyc->state,
                $kyc->verified ? 'true' : 'false',
                '<div class="btn-group btn-group-xs row-actions" data-action="' . $kyc->id . '"><a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:;"><i class="icon-settings"></i> Tools <i class="fa fa-angle-down"></i></a><ul class="dropdown-menu pull-right"><li><a href="javascript:" data-action="view"><i class="icon-pencil"></i> View</a></li>
               <li><a href="javascript:" data-action="delete"><i class="glyphicon glyphicon-trash"></i> Delete</a></li></ul></div>'
            ]);
        });

        return response()->json(compact('data', 'draw', 'recordsTotal', 'recordsFiltered'));
    }

    /**
     * Get form for address edit
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $kyc = KnowYourCustomer::findOrFail($id);

        return response(view('admin.kyc.edit', compact('kyc')))->header('title', 'View ' . ucfirst($kyc->first_name . " " . $kyc->middle_name . " " . $kyc->last_name) . '  KYC.');
    }

    /**
     * Update Admin's Kyc address
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'active' => 'required|boolean',
        ]);

        $kyc = KnowYourCustomer::findOrFail($id);

        if ($kyc->verified == false && $request->get('active'))
            $kyc->user->notify(new KYCVerified);

        $kyc->verified = $request->get('active');

        $kyc->save();

        return response()->json(['type' => 'success', 'message' => 'KYC is verified.']);
    }


    public function destroy($id)
    {
        $kyc = KnowYourCustomer::findOrFail($id);

        $kyc->delete();

        return response()->json(['type' => 'success', 'message' => 'Kyc has been deleted successfully.']);
    }
}
