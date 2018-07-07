<?php

namespace BCES\Http\Controllers\Admin;

use BCES\Models\Platform;
use Illuminate\Http\Request;
use BCES\Http\Controllers\Controller;

class PlatformController extends Controller
{
    /**
     * Show the application's admin dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.platform.index');
    }

    /**
     * Show the application's admin tokens list
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function platformlist(Request $request)
    {
        $draw = (int)$request->get('draw');
        $data = collect([]);

        $platforms = Platform::query();

        $columns = ['title', 'description'];

        if ($request->order[0]['column'] < 5)
            $platforms->orderBy($columns[$request->order[0]['column']], $request->order[0]['dir']);

        $platforms->offset($request->start);
        $platforms->limit($request->length);

        $recordsTotal = $recordsFiltered = $platforms->count();

        $platforms = $platforms->get();

        $platforms->each(function ($platform) use ($data) {
            $data->push([
                ucfirst($platform->title),
                $platform->description,
             '<div class="btn-group btn-group-xs row-actions" data-action="' . $platform->id . '"><a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:;"><i class="icon-settings"></i> Tools <i class="fa fa-angle-down"></i></a><ul class="dropdown-menu pull-right"><li><a href="javascript:" data-action="edit"><i class="icon-pencil"></i> Edit</a></li></ul></div>'
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


        $platform = Platform::whereId($id)->first();
        $platform->fill($request->all());
        $platform->save();

        return response()->json(['type' =>  'success' , 'message' => 'Platform  has been updated']);
    }

    /**
     * Get form for address edit
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {

          $platform = Platform::whereId($id)->first();

        return response(view('admin.platform.edit', compact('platform')))->header('title', 'Update ' . ucfirst($platform->title) . '  platform.');
    }

    /**
     * Get form for address edit
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $platform = null;

        return response(view('admin.platform.edit', compact('platform')))->header('title', 'Add new platform');
    }

    public function add(Request $request)
    {
        $this->validate($request, [

            'title' => 'required',
            'description' => 'required',


        ]);

        Platform::create($request->all());

        return response()->json(['type' => 'success', 'message' => 'Platform has been added.']);
    }
}
