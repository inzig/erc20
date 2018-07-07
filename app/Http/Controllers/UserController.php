<?php

namespace BCES\Http\Controllers;

use BCES\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param $type
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($type, $id)
    {
        if (!in_array($type, ['show', 'edit'])) throw new NotFoundHttpException();

        $user = User::whereId($id)->with('icos', 'history')->first();

        if (!$user) throw new NotFoundHttpException();

        $eth = $user->icos->where('type', 'ethereum')->first();

        return response(view('admin.users.' . $type, compact('user', 'eth')))->header('name', $user->name);
    }

    /**
     * Get users according to parameters
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data = collect([]);
        $draw = (int)$request->get('draw');

        $columns = ['users.id', 'name', 'email', 'initial_coin_offerings.address', 'activated', 'oauth', 'users.created_at'];

        $builder = User::query();

        $builder->where('users.id', '!=', 1);

        $builder->select($columns);

        $builder->leftJoin('initial_coin_offerings', 'users.id', '=', 'initial_coin_offerings.user_id');

        $builder->where('initial_coin_offerings.type', 'ethereum');

        if ($request->get('user_id'))
            $builder->where('users.id', $request->get('user_id'));

        if ($request->get('name'))
            $builder->where(\DB::raw('LOWER(`name`)'), 'LIKE', '%' . $request->get('name') . '%');

        if ($request->get('email'))
            $builder->where(\DB::raw('LOWER(`email`)'), 'LIKE', '%' . $request->get('email') . '%');

        if ($request->get('address'))
            $builder->where(\DB::raw('LOWER(`address`)'), 'LIKE', '%' . $request->get('address') . '%');

        if ($request->get('activated'))
            $builder->where('activated', $request->has('activated') && $request->get('activated') == '1' ? 1 : 0);

        if ($request->get('oauth'))
            $builder->where('oauth', $request->has('oauth') && $request->get('oauth') == '1' ? 1 : 0);

        try {
            if ($request->get('created_at') && Carbon::createFromFormat('m/d/Y H:i', $request->get('created_at')))
                $builder->whereDate('users.created_at', Carbon::createFromFormat('m/d/Y H:i', $request->get('created_at')));
        } catch (\Exception $e) {
        }

        if ($request->get('order')[0]['column'] < 7)
            $builder->orderBy($columns[$request->get('order')[0]['column']], $request->get('order')[0]['dir']);

        $recordsTotal = $recordsFiltered = $builder->count();

        $builder
            ->offset($request->get('start'))
            ->limit($request->get('length'))
            ->get()->each(function ($u) use ($data, $request) {
                $data->push([
                    $u->id,
                    $u->name,
                    $u->email,
                    $u->address,
                    $u->activated ? 'true' : 'false',
                    $u->oauth ? 'yes' : 'no',
                    $u->created_at->diffForHumans(),
                    '<div class="btn-group btn-group-xs row-actions" data-action="' . $u->id . '"><a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:;"><i class="icon-settings"></i> Tools <i class="fa fa-angle-down"></i></a><ul class="dropdown-menu pull-right"><li><a href="javascript:" data-action="show"><i class="icon-eye"></i> show</a></li><li><a href="javascript:" data-action="edit"><i class="icon-pencil"></i> Edit</a></li></ul></div>'
                ]);
            });

        return response()->json(compact('data', 'draw', 'recordsTotal', 'recordsFiltered'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $user = User::whereId($id)->with('icos')->first();

        if (!$user) throw new NotFoundHttpException();

        collect($request->get('icos'))->each(function ($v, $k) use ($user) {
            $ico = $user->icos->where('type', $k)->first();
            if ($ico && $ico->address != $v) {
                $ico->address = $v;
                $ico->save();
            }
        });

        if ($request->has('name') && $request->get('name') != $user->name)
            $user->name = $request->get('name');

        if ($request->has('email') && $request->get('email') != $user->email)
            $user->email = $request->get('email');

        $user->save();

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return response()->json($user);
    }
}
