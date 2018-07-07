<?php

namespace BCES\Http\Controllers\Admin;

use Illuminate\Http\Request;
use BCES\Http\Controllers\Controller;

class AvatarController extends Controller
{
    public function __invoke(Request $request)
    {
        return response()->json(['path' => 'storage' . str_replace('public', '', $request->file('avatar')->store('public/avatars'))]);
    }
}
