<?php

namespace App\Http\Controllers\Installation;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
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
     * @return Redirector|RedirectResponse
     */
	public function store()
	{		
		@set_time_limit(0);

		Artisan::call('migrate', ['--force' => true]);
		
		return redirect(route('installation.accounts.index'));
	}
}
