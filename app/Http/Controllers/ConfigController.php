<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseDashboard;
use Illuminate\Support\Facades\Gate;
use Auth;

class ConfigController extends BaseDashboard
{
    public function __construct()
    {
        $this -> middleware('auth');
        parent::__construct();
    }

    public function view()
    {
        if( Gate::allows('config', Auth::user()) )
        {
            return view('02_system.00_configuration.index');
        }
            return view('02_system..unauthorized');
    }
}
