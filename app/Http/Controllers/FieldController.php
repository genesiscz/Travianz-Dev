<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FieldController extends Controller
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
     *  Show the fields view
     *
     * @return Factory|View
     */
    public function index()
    {
        $village = Auth::user()->selectedVillage->village;

        return view('village.fields')->with(['village' => $village]);
    }
}
