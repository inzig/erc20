<?php

namespace BCES\Http\Controllers\Admin;

use BCES\Models\Member;
use Illuminate\Http\Request;
use BCES\Http\Controllers\Controller;
use Illuminate\Support\Str;

class AdvisorsController extends Controller
{
    /**
     * Show the application's admin dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.advisors.index');
    }

    /**
     * Show the application's admin tokens list
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function teamMembers(Request $request)
    {
        $draw = (int)$request->get('draw');
        $data = collect([]);

        $team_members = Member::query()->where('title','Advisor');

        $columns = ['name', 'designation', 'description', 'linkedin'];

        if ($request->order[0]['column'] < 4)
            $team_members->orderBy($columns[$request->order[0]['column']], $request->order[0]['dir']);

        $team_members->offset($request->start);
        $team_members->limit($request->length);

        $team_members = $team_members->where('title','Advisor')->get();
        $recordsTotal = $recordsFiltered = $team_members->count();



        $team_members->each(function ($member) use ($data) {
            $data->push([
                ucfirst($member->name),
                $member->designation,
                Str::limit($member->description, 65),
                //  $member->linkedin,
                trim(Str::replaceFirst('https://www.linkedin.com/in/', '', $member->linkedin), "/"),
                '<div class="btn-group btn-group-xs row-actions" data-action="' . $member->id . '"><a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:;"><i class="icon-settings"></i> Tools <i class="fa fa-angle-down"></i></a><ul class="dropdown-menu pull-right"><li><a href="javascript:" data-action="edit"><i class="icon-pencil"></i> Edit</a></li><li><a href="javascript:" data-action="delete"><i class="glyphicon glyphicon-trash"></i> Delete</a></li></ul></div>'
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
            'designation_en' => 'required',
            'description_en' => 'required',
            'linkedin' => 'required',
        ],
            [
                'designation_en.required'=>'Designation in english is required',
                'description_en.required'=>'Description in english is required'
            ]
        );

        $member = Member::findOrFail($id);

        $member->name = $request->get('name');
        $member->designation_en = $request->get('designation_en');
        $member->description_en = $request->get('description_en');
        $member->linkedin = $request->get('linkedin');

        if ($request->has('avatar') && $request->get('avatar') != '') {
            $member->avatar = $request->get('avatar');
        }

        $member->save();

        return response()->json(['type' => 'success', 'message' => 'Advisor Member has been updated']);
    }

    /**
     * Get form for address edit
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {

        $member = Member::whereId($id)->first();

        return response(view('admin.advisors.edit', compact('member')))->header('title', 'Update ' . ucfirst($member->name) . '  information.');
    }

    /**
     * Get form for address edit
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $member = null;

        return response(view('admin.advisors.edit', compact('member')))->header('title', 'Add new advisor member');
    }

    public function add(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'designation_en' => 'required',
            'description_en' => 'required',
            'linkedin' => 'required',
        ],
            [
                'designation_en.required'=>'Designation in english is required',
                'description_en.required'=>'Description in english is required'
            ]);


        Member::create($request->all());

        return response()->json(['type' => 'success', 'message' => 'New Advisor has been added.']);
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return response()->json(['type' => 'success', 'message' => 'Advisor member has been  deleted successfully.']);
    }
}
