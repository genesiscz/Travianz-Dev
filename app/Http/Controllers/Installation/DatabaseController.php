<?php

namespace App\Http\Controllers\Installation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class DatabaseController extends Controller
{

	/**
	 * Show the database view
	 * 
	 * @return View
	 */
	public function index(): View
	{
		return view('installation.database');
	}
	
	/**
	 * Store the database structure
	 * 
	 * @param Request $request
	 * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
	 */
	public function store()
	{		
		@set_time_limit(0);

		Artisan::call('migrate', ['--force' => true]);
		
		return redirect(route('installation.accounts'));
	}
}
