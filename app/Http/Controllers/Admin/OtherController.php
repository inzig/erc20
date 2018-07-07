<?php

namespace BCES\Http\Controllers\Admin;

use BCES\Models\Other;
use Illuminate\Http\Request;
use BCES\Http\Controllers\Controller;

class OtherController extends Controller
{
    /**
     * Show the application's admin dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.other.index');
    }

    /**
     * Show the application's admin tokens list
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function otherList(Request $request)
    {
        $draw = (int)$request->get('draw');
        $data = collect([]);

        $others = Other::query();

        $columns = ['title_en', 'description_en'];

        if ($request->order[0]['column'] < 5)
            $others->orderBy($columns[$request->order[0]['column']], $request->order[0]['dir']);

        $others->offset($request->start);
        $others->limit($request->length);

        $recordsTotal = $recordsFiltered = $others->count();

        $others = $others->get();

        $others->each(function ($other) use ($data) {
            $data->push([
                ucfirst($other->title_en),
                $other->description_en,
             '<div class="btn-group btn-group-xs row-actions" data-action="' . $other->id . '"><a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:;"><i class="icon-settings"></i> Tools <i class="fa fa-angle-down"></i></a><ul class="dropdown-menu pull-right"><li><a href="javascript:" data-action="edit"><i class="icon-pencil"></i> Edit</a></li>
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

            'title_en' => 'required',
            'description_en' => 'required',
        ],[
            'title_en.required' => 'Title in english is required',
            'description_en'    => 'Description in english is required'
        ]);

        $other = Other::whereId($id)->first();
        $other->fill($request->all());
        $other->save();

        return response()->json(['type' =>  'success' , 'message' => 'Faq has been updated']);
    }

    /**
     * Get form for address edit
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {

        $other = Other::whereId($id)->first();

        return response(view('admin.other.edit', compact('other')))->header('title', 'Update faq.');
    }

    /**
     * Get form for address edit
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $other = null;

        return response(view('admin.other.edit', compact('other')))->header('title', 'Add new faq');
    }

    public function add(Request $request)
    {
        $this->validate($request, [

            'title_en' => 'required',
            'description_en' => 'required',
        ],[
            'title_en.required' => 'Title in english is required',
            'description_en.required' => 'Description in english is required'
        ]);

        Other::create($request->all());

        return response()->json(['type' => 'success', 'message' => 'Faq has been added.']);
    }
    public function destroy($id)
    {
        $other = Other::find($id);
        $other->delete();

        return response()->json(['type' => 'success', 'message' => 'Faq has been deleted successfully.']);
    }
}
