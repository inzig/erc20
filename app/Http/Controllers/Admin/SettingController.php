<?php

namespace BCES\Http\Controllers\Admin;

use BCES\Models\Setting;
use Illuminate\Http\Request;
use BCES\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Load all settings
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.settings.index', ['settings' => Setting::where('name', 'not like', '%increment%')->get()]);
    }

    /**
     * Get a setting for edit
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        return view('admin.settings.show', ['setting' => Setting::findOrFail($id)]);
    }

    /**
     * Update already existing setting for Passo from Setting page
     *
     * @param Request $request
     * @param $type
     */
    public function store(Request $request, $type)
    {
        $setting = Setting::whereName($type)->firstOrFail();

        $setting->value = $request->get('data');

        $setting->save();
    }

    /**
     * Update already existing setting for Passo
     *
     * @param Request $request
     * @param $type
     */
    public function update(Request $request, $type)
    {
        $setting = Setting::whereName($type)->firstOrFail();

        $setting->value = json_encode($request->all());

        $setting->save();
    }
}
