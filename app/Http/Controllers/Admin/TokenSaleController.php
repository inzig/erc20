<?php

namespace BCES\Http\Controllers\Admin;

use BCES\Models\TokenSale;
use Illuminate\Http\Request;
use BCES\Http\Controllers\Controller;

class TokenSaleController extends Controller
{
    /**
     * Show the application's admin dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.tokensale.index');
    }

    /**
     * Show the application's admin tokens list
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function tokenSaleList(Request $request)
    {
        $draw = (int)$request->get('draw');
        $data = collect([]);

        $tokensales = TokenSale::query();

        $columns = ['title', 'description'];

        if ($request->order[0]['column'] < 5)
            $tokensales->orderBy($columns[$request->order[0]['column']], $request->order[0]['dir']);

        $tokensales->offset($request->start);
        $tokensales->limit($request->length);

        $recordsTotal = $recordsFiltered = $tokensales->count();

        $tokensales = $tokensales->get();

        $tokensales->each(function ($tokensale) use ($data) {
            $data->push([
                ucfirst($tokensale->title),
                $tokensale->description,
             '<div class="btn-group btn-group-xs row-actions" data-action="' . $tokensale->id . '"><a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:;"><i class="icon-settings"></i> Tools <i class="fa fa-angle-down"></i></a><ul class="dropdown-menu pull-right"><li><a href="javascript:" data-action="edit"><i class="icon-pencil"></i> Edit</a></li></ul></div>'
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


        $tokensale = TokenSale::whereId($id)->first();
        $tokensale->save();

        return response()->json(['type' =>  'success' , 'message' => 'Tokensale has been updated']);
    }

    /**
     * Get form for address edit
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {

          $tokensale = TokenSale::whereId($id)->first();

        return response(view('admin.tokensale.edit', compact('tokensale')))->header('title', 'Update coin  Tokensale.');
    }

    /**
     * Get form for address edit
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $tokensale = null;

        return response(view('admin.tokensale.edit', compact('tokensale')))->header('title', 'Add new tokensale');
    }

    public function add(Request $request)
    {
        $this->validate($request, [

            'title' => 'required',
            'description' => 'required',


        ]);

        TokenSale::create($request->all());

        return response()->json(['type' => 'success', 'message' => 'Tokensale has been added.']);
    }
}
