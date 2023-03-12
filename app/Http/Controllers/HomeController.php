<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function active()
    {
        DB::table('activation')->latest('active')->update([
            'active'=>'1'
        ]);
        return redirect()->back()->with('success','done activated');
    }
    public function deactive()
    {
        DB::table('activation')->latest('active')->update([
            'active'=>'0'
        ]);
        return redirect()->back()->with('success','done deactivated');
    }
}
