<?php

namespace BCES\Http\Controllers\Admin;

use BCES\Models\Subscribe;
use Illuminate\Http\Request;
use BCES\Http\Controllers\Controller;

class SubscribersController extends Controller
{
    /**
     * Show the application's admin dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.subscribers.index');
    }

    /**
     * Show the application's admin tokens list
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function subscribersList(Request $request)
    {
        $draw = (int)$request->get('draw');
        $data = collect([]);

        $subscribers = Subscribe::query();

        $subscribers->leftJoin('users', 'users.email', '=', 'subscribes.email');

        $columns = ['subscribes.id','users.name','subscribes.email', 'subscribes.created_at'];
        $subscribers->select($columns);

        if ($request->order[0]['column'] < 3)
            $subscribers->orderBy($columns[$request->order[0]['column']], $request->order[0]['dir']);

        $subscribers->offset($request->start);
        $subscribers->limit($request->length);

        $recordsTotal = $recordsFiltered = $subscribers->count();

        $subscribers->get()->each(function ($subscriber) use ($data) {
            $data->push([
                $subscriber->name,
                $subscriber->email,
                $subscriber->created_at->format('H:i d/m/Y'),
                '<div class="btn-group btn-group-xs row-actions" data-action="' . $subscriber->id . '">
                 <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:;"><i class="icon-settings"></i> Tools <i class="fa fa-angle-down"></i></a>
               <ul class="dropdown-menu pull-right">
               <li><a href="javascript:" data-action="delete"><i class="glyphicon glyphicon-trash"></i> Delete</a></li></ul></div>'
            ]);
        });

        return response()->json(compact('data', 'draw', 'recordsTotal', 'recordsFiltered'));
    }

    public function destroy($id)
    {
        $subscriber = Subscribe::find($id);
        $subscriber->delete();

        return response()->json(['type' => 'success', 'message' => 'Subscriber has been deleted successfully.']);
    }
}
