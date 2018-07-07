<?php

namespace BCES\Http\Controllers\Admin;

use BCES\Models\Bonuse;
use Illuminate\Http\Request;
use BCES\Http\Controllers\Controller;

class BonuseController extends Controller
{
    /**
     * Show the application's admin dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.bonuse.index');
    }

    /**
     * Show the application's admin tokens list
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function bonuselist(Request $request)
    {
        $draw = (int)$request->get('draw');
        $data = collect([]);

        $bonuses = Bonuse::query();

        $columns = ['title', 'first_offer','second_offer'];

        if ($request->order[0]['column'] < 5)
            $bonuses->orderBy($columns[$request->order[0]['column']], $request->order[0]['dir']);

        $bonuses->offset($request->start);
        $bonuses->limit($request->length);

        $recordsTotal = $recordsFiltered = $bonuses->count();

        $bonuses = $bonuses->get();

        $bonuses->each(function ($bonuse) use ($data) {
            $data->push([
                ucfirst($bonuse->title),
                $bonuse->first_offer,
                $bonuse->second_offer,
             '<div class="btn-group btn-group-xs row-actions" data-action="' . $bonuse->id . '"><a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:;"><i class="icon-settings"></i> Tools <i class="fa fa-angle-down"></i></a><ul class="dropdown-menu pull-right"><li><a href="javascript:" data-action="edit"><i class="icon-pencil"></i> Edit</a></li></ul></div>'
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


        $bonuse = Bonuse::whereId($id)->first();
        $bonuse->save();

        return response()->json(['type' =>  'success' , 'message' => 'Bonuse has been updated']);
    }

    /**
     * Get form for address edit
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {

          $bonuse = Bonuse::whereId($id)->first();

        return response(view('admin.bonuse.edit', compact('bonuse')))->header('title', 'Update ' . ucfirst($bonuse->title) . '  bonuse.');
    }

    /**
     * Get form for address edit
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $bonuse = null;

        return response(view('admin.bonuse.edit', compact('bonuse')))->header('title', 'Add new bonuse');
    }

    public function add(Request $request)
    {
        $this->validate($request, [

            'title' => 'required',
            'first_offer' => 'required',
            'second_offer'=>'required',


        ]);

        Bonuse::create($request->all());

        return response()->json(['type' => 'success', 'message' => 'Bonuse has been added.']);
    }
}
