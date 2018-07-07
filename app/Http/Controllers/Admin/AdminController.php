<?php

namespace BCES\Http\Controllers\Admin;

use BCES\Models\AddressPool;
use BCES\Models\ICOBonus;
use BCES\Models\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use BCES\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Show the application's admin dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.address.index');
    }
    /**
     * Update notifiactions for read mark
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function readNoty($id)
    {
        auth()->user()->notifications()->where('id', $id)->update(['read_at' => Carbon::now()]);

        return response()->json(['status' => 'Read marked.']);
    }

    /**
     * Pools listing according to type
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function pools(Request $request, $type)
    {
        $draw = (int)$request->get('draw');
        $data = collect([]);

        $pools = AddressPool::with('user')->whereCryptoType(strtoupper($type));

        $pools->offset($request->start);
        $pools->limit($request->length);

        $recordsTotal = $recordsFiltered = $pools->count();

        $pools->get()->each(function ($pool) use ($data) {
            $data->push([
                $pool->user ? $pool->user->name : '',
                $pool->user ? $pool->user->email : '',
                $pool->address,
                $pool->user ? 'yes' : 'no',
                $pool->updated_at->format('H:i d/m/Y'),
                '<div class="btn-group btn-group-xs row-actions" data-action="' . $pool->id . '"><a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:;"><i class="icon-settings"></i> Tools <i class="fa fa-angle-down"></i></a><ul class="dropdown-menu pull-right"><li><a href="javascript:" data-action="edit"><i class="icon-pencil"></i> Edit</a></li></ul></div>'
            ]);
        });

        return response()->json(compact('data', 'draw', 'recordsTotal', 'recordsFiltered'));
    }

    public function increments(Request $request)
    {
        collect($request->all())->each(function ($item, $key) {
            $setting = Setting::whereName($key)->first();
            if ($setting) {
                $setting->value = $item;
                $setting->save();
            }
        });

        return response()->json(['type' => 'success', 'message' => 'Increments for earnings has been updated.']);
    }

    public function poolUpdate($id)
    {
        $pool = AddressPool::findOrFail($id);

        return response(view('admin.address.edit-pool', compact('pool')))->header('title', 'Update Address & Type');
    }

    public function updatedPool(Request $request, $id)
    {
        $pool = AddressPool::findOrFail($id);

        $pool->crypto_type = $request->type;
        $pool->address = $request->address;

        $pool->save();

        if ($request->has('active'))
            return response()->json(['type' => ($pool->active ? 'success' : 'warning'), 'message' => 'Token address is ' . ($pool->active ? 'activated' : 'deactivated') . '.']);
        else
            return response()->json(['type' => 'success', 'message' => 'Token address has been updated.']);
    }

    /**
     * Show the application's admin tokens list
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function tokens(Request $request)
    {
        $draw = (int)$request->get('draw');
        $data = collect([]);

        $icos = \Auth::user()->icos();

        $columns = ['type', 'address', 'earnings', 'minimum', 'created_at'];

        if ($request->order[0]['column'] < 5)
            $icos->orderBy($columns[$request->order[0]['column']], $request->order[0]['dir']);

        $recordsTotal = $recordsFiltered = $icos->count();

        $icos->offset($request->start);
        $icos->limit($request->length);

        $icos = $icos->get();

        $icos->each(function ($ico) use ($data) {
            $data->push([
                ucfirst($ico->type),
                $ico->title,
                $ico->address,
                $ico->minimum,
                $ico->earnings,
                $ico->updated_at->format('H:i d/m/Y'),
                '<div class="btn-group btn-group-xs row-actions" data-action="' . $ico->id . '"><a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:;"><i class="icon-settings"></i> Tools <i class="fa fa-angle-down"></i></a><ul class="dropdown-menu pull-right"><li><a href="javascript:" data-action="active"><i class="fa fa-' . ($ico->active ? 'check' : 'close') . '"></i> ' . ($ico->active ? 'Deactivate' : 'Activate') . '</a></li><li><a href="javascript:" data-action="edit"><i class="icon-pencil"></i> Edit</a></li></ul></div>'
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
        $ico = \Auth::user()->icos()->whereId($id)->first();

        $ico->fill($request->all());

        if ($request->has('active'))
            $ico->active = $request->get('active');

        $ico->save();

        if ($request->has('active'))
            return response()->json(['type' => ($ico->active ? 'success' : 'warning'), 'message' => 'Token address is ' . ($ico->active ? 'activated' : 'deactivated') . '.']);
        else if ($request->has('hard_cap'))
            return response()->json(['type' => 'success', 'message' => 'ICO has been updated.']);
        else
            return response()->json(['type' => 'success', 'message' => 'Token address has been updated.']);

    }

    /**
     * Get form for address edit
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $ico = \Auth::user()->icos()->whereId($id)->first();

        return response(view('admin.address.edit', compact('ico')))->header('title', 'Update ' . ucfirst($ico->type) . ' address information.');
    }

    /**
     * Get form for address edit
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $ico = null;

        return response(view('admin.address.edit', compact('ico')))->header('title', 'Add new ICO address information.');
    }

    /**
     * Update Timer of ICO
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateTimer(Request $request)
    {
        $ethereum = \Auth::user()->icos()->whereType('ethereum')->first();

        $ethereum->pre_sale_at = Carbon::createFromFormat('j F Y - H:i', $request->get('pre_sale_at'));
        $ethereum->pre_sale_end_at = Carbon::createFromFormat('j F Y - H:i', $request->get('pre_sale_end_at'));
        $ethereum->pre_ico_at = Carbon::createFromFormat('j F Y - H:i', $request->get('pre_ico_at'));
        $ethereum->pre_ico_end_at = Carbon::createFromFormat('j F Y - H:i', $request->get('pre_ico_end_at'));
        $ethereum->main_ico_at = Carbon::createFromFormat('j F Y - H:i', $request->get('main_ico_at'));
        $ethereum->ico_expire_at = Carbon::createFromFormat('j F Y - H:i', $request->get('ico_expire_at'));

        $ethereum->save();

        return response()->json(['type' => 'success', 'message' => 'ICO timer has been updated.']);
    }

    /**
     * Add new address for admin
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'title' => 'required',
            'address' => 'required',
            'minimum' => 'required',
            'expire_at' => 'required|date',
        ]);

        \Auth::user()->icos()->create($request->all());

        return response()->json(['type' => 'success', 'message' => 'Token address has been added.']);
    }

    /**
     * Add new bonus for ICO
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function bonusAdd(Request $request)
    {
        $this->validate($request, [
            'week' => 'required|integer',
            'discount' => 'required|integer',
        ]);

        ICOBonus::create($request->all());

        return response()->json(['type' => 'success', 'message' => 'Bonus has been added.']);
    }

    /**
     * Update a bonus for ICO
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function bonusUpdate(Request $request, ICOBonus $bonus)
    {
        $this->validate($request, [
            'discount' => 'required|integer',
            'week' => 'integer',
            'type' => 'string',
        ]);

        $bonus->fill($request->all());
        $bonus->save();

        return response()->json(['type' => 'success', 'message' => 'Bonus has been update.', 'data' => $bonus]);
    }

    /**
     * Delete a bonus for ICO
     *
     * @param ICOBonus $bonus
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function bonusDelete(ICOBonus $bonus)
    {
        $bonus->delete();

        return response()->json(['type' => 'success', 'message' => 'Bonus has been deleted.']);
    }
}
