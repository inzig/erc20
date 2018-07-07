<?php

namespace BCES\Http\Controllers\Admin;

use BCES\Models\Roadmap;
use Illuminate\Http\Request;
use BCES\Http\Controllers\Controller;

class RoadmapController extends Controller
{
    /**
     * Show the application's admin dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.roadmap.index');
    }

    /**
     * Show the application's admin tokens list
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function roadmaplist(Request $request)
    {
        $draw = (int)$request->get('draw');
        $data = collect([]);

        $roadmaps = Roadmap::query();

        $columns = ['title', 'description'];

        if ($request->order[0]['column'] < 5)
            $roadmaps->orderBy($columns[$request->order[0]['column']], $request->order[0]['dir']);

        $roadmaps->offset($request->start);
        $roadmaps->limit($request->length);

        $recordsTotal = $recordsFiltered = $roadmaps->count();

        $roadmaps = $roadmaps->get();

        $roadmaps->each(function ($roadmap) use ($data) {
            $data->push([
                $roadmap->year,
                ucfirst($roadmap->title),
                $roadmap->description,

                '<div class="btn-group btn-group-xs row-actions" data-action="' . $roadmap->id . '"><a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:;"><i class="icon-settings"></i> Tools <i class="fa fa-angle-down"></i></a><ul class="dropdown-menu pull-right"><li><a href="javascript:" data-action="edit"><i class="icon-pencil"></i> Edit</a></li>
               <li><a href="javascript:" data-action="delete"><i class="glyphicon glyphicon-trash"></i> Delete</a></li></ul></div>'
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
        $this->validate($request, [

            'title' => 'required',
            'description_en' => 'required',
            'year' =>'required'


        ],[
            'description_en.required' => 'Description in english is required'
        ]);



        $roadmap = Roadmap::whereId($id)->first();
        $roadmap->fill($request->all());
        $roadmap->save();

        return response()->json(['type' =>  'success' , 'message' => 'Roadmap has been updated']);
    }

    /**
     * Get form for address edit
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {

        $roadmap = Roadmap::whereId($id)->first();

        return response(view('admin.roadmap.edit', compact('roadmap')))->header('title', 'Update ' . ucfirst($roadmap->title) . '  roadmap.');
    }

    /**
     * Get form for address edit
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $roadmap = null;

        return response(view('admin.roadmap.edit', compact('roadmap')))->header('title', 'Add new roadmap');
    }

    public function add(Request $request)
    {
        $this->validate($request, [

            'title' => 'required',
            'description_en' => 'required',
            'year' =>'required'


        ],[
            'description_en.required' => 'Description in english is required'
        ]);

        Roadmap::create($request->all());

        return response()->json(['type' => 'success', 'message' => 'Roadmap has been added.']);
    }
    public function destroy($id)
    {
        $roadmap = Roadmap::find($id);
        $roadmap->delete();

        return response()->json(['type' => 'success', 'message' => 'Roadmap has been deleted successfully.']);
    }
}
