<?php

namespace BCES\Http\Controllers\Admin;

use BCES\Models\Partner;
use Illuminate\Http\Request;
use BCES\Http\Controllers\Controller;

class MediaPartnersController extends Controller
{
    /**
     * Show the application's admin dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.mediapartner.index');
    }

    /**
     * Show the application's admin tokens list
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function mediaPartnersList(Request $request)
    {
        $draw = (int)$request->get('draw');
        $data = collect([]);

        $partners = Partner::query()->where('title','mediaPartner');;


        $columns = ['name', 'avator'];

        if ($request->order[0]['column'] < 5)
            $partners->orderBy($columns[$request->order[0]['column']], $request->order[0]['dir']);

        $partners->offset($request->start);
        $partners->limit($request->length);

        $recordsTotal = $recordsFiltered = $partners->count();

        $partners = $partners->get();

        $partners->each(function ($partner) use ($data) {
            $data->push([
                $partner->name,
                '<img src="/'.$partner->avatar.'" alt="" width="80px" height="70px">',
                $partner->url,

                '<div class="btn-group btn-group-xs row-actions" data-action="' . $partner->id . '"><a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:;"><i class="icon-settings"></i> Tools <i class="fa fa-angle-down"></i></a><ul class="dropdown-menu pull-right"><li><a href="javascript:" data-action="edit"><i class="icon-pencil"></i> Edit</a></li>
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

            'name' => 'required',
            'url'  => 'required|url'


        ]);
        $partner = Partner::whereId($id)->first();

        $partner->name = $request->get('name');
        $partner->url = $request->get('url');

        if($request->has('avatar') && $request->get('avatar') != ''){
            $partner->avatar = $request->get('avatar');
        }
        $partner->save();

        return response()->json(['type' =>  'success' , 'message' => 'Media partner has been updated']);
    }

    /**
     * Get form for address edit
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {

        $partner = Partner::whereId($id)->first();

        return response(view('admin.mediapartner.edit', compact('partner')))->header('title', 'Update ' . ucfirst($partner->name) . '  media partner.');
    }

    /**
     * Get form for address edit
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $partner = null;

        return response(view('admin.mediapartner.edit', compact('partner')))->header('title', 'Add new media partner');
    }

    public function add(Request $request)
    {
        $this->validate($request, [

            'name' => 'required',
            'avatar' => 'required',
            'url' => 'required|url'


        ]);

        Partner::create($request->all());

        return response()->json(['type' => 'success', 'message' => 'Media partner has been added.']);
    }
    public function destroy($id)
    {
        $partner = Partner::find($id);
        $partner->delete();

        return response()->json(['type' => 'success', 'message' => 'Media partner has been deleted successfully.']);
    }
}
