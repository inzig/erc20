<?php

namespace BCES\Http\Controllers;

use BCES\Concerns\ICOBasic;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use ICOBasic;

    /**
     * Show the application user's dashboard.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard.profile', $this->getICOData());
    }
}
