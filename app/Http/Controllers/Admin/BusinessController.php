<?php

namespace BCES\Http\Controllers\Admin;

use BCES\Models\Business;
use Illuminate\Http\Request;
use BCES\Http\Controllers\Controller;

class BusinessController extends Controller
{
    /**
     * Show the application's admin dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.business.index');
    }

    /**
     * Show the application's admin tokens list
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function businessList(Request $request)
    {
        $draw = (int)$request->get('draw');
        $data = collect([]);

        $businesses = Business::query();

        $columns = ['title', 'description'];

        if ($request->order[0]['column'] < 5)
            $businesses->orderBy($columns[$request->order[0]['column']], $request->order[0]['dir']);

        $businesses->offset($request->start);
        $businesses->limit($request->length);

        $recordsTotal = $recordsFiltered = $businesses->count();

        $businesses = $businesses->get();

        $businesses->each(function ($business) use ($data) {
            $data->push([
                ucfirst($business->title),
                $business->description,
             '<div class="btn-group btn-group-xs row-actions" data-action="' . $business->id . '"><a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:;"><i class="icon-settings"></i> Tools <i class="fa fa-angle-down"></i></a><ul class="dropdown-menu pull-right"><li><a href="javascript:" data-action="edit"><i class="icon-pencil"></i> Edit</a></li></ul></div>'
            ]);
        });

        return response()->json(compact('data', 'draw', 'recordsTotal', 'recordsFiltered'));
    }

    /**
     * Update Admin's Token address
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {


        $business = Business::whereId($id)->first();
        $business->save();

        return response()->json(['type' =>  'success' , 'message' => 'Business has been updated']);
    }

    /**
     * Get form for address edit
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {

        $business = Business::whereId($id)->first();

        return response(view('admin.business.edit', compact('business')))->header('title', 'Update Business.');
    }

    /**
     * Get form for address edit
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $business = null;

        return response(view('admin.business.edit', compact('business')))->header('title', 'Add new business');
    }

    public function add(Request $request)
    {
        $this->validate($request, [

            'title' => 'required',
            'description' => 'required',


        ]);

        Business::create($request->all());

        return response()->json(['type' => 'success', 'message' => 'Business has been added.']);
    }
}
