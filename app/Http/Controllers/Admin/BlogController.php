<?php

namespace BCES\Http\Controllers\Admin;

use BCES\Models\Blog;
use Illuminate\Http\Request;
use BCES\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Show the application's admin dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.blog.index');
    }

    /**
     * Show the application's admin tokens list
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function bloglist(Request $request)
    {
        $draw = (int)$request->get('draw');
        $data = collect([]);

        $blogs = Blog::query();

        $columns = ['title', 'description'];

        if ($request->order[0]['column'] < 5)
            $blogs->orderBy($columns[$request->order[0]['column']], $request->order[0]['dir']);

        $blogs->offset($request->start);
        $blogs->limit($request->length);

        $recordsTotal = $recordsFiltered = $blogs->count();

        $blogs = $blogs->get();

        $blogs->each(function ($blog) use ($data) {
            $data->push([
                ucfirst($blog->title),
                $blog->description,
             '<div class="btn-group btn-group-xs row-actions" data-action="' . $blog->id . '"><a class="btn btn-default dropdown-toggle" data-toggle="dropdown" href="javascript:;"><i class="icon-settings"></i> Tools <i class="fa fa-angle-down"></i></a><ul class="dropdown-menu pull-right"><li><a href="javascript:" data-action="edit"><i class="icon-pencil"></i> Edit</a></li></ul></div>'
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


        $blog = Blog::whereId($id)->first();
        $blog->save();

        return response()->json(['type' =>  'success' , 'message' => 'Blog has been updated']);
    }

    /**
     * Get form for address edit
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {

          $blog = Blog::whereId($id)->first();

        return response(view('admin.blog.edit', compact('blog')))->header('title', 'Update ' . ucfirst($blog->title) . '  blog.');
    }

    /**
     * Get form for address edit
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $blog = null;

        return response(view('admin.blog.edit', compact('blog')))->header('title', 'Add new blog');
    }

    public function add(Request $request)
    {
        $this->validate($request, [

            'title' => 'required',
            'description' => 'required',


        ]);

        Blog::create($request->all());

        return response()->json(['type' => 'success', 'message' => 'Blog has been added.']);
    }
}
