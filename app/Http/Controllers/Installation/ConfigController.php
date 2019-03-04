<?php

namespace App\Http\Controllers\Installation;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConfig;
use App\Traits\ManageConfig;
use Illuminate\Contracts\View\View;

class ConfigController extends Controller
{

	use ManageConfig;

	/**
	 * Show the config view
	 * 
	 * @return View
	 */
	public function index(): View
	{
		return view('installation.config');
	}

	/**
	 * Store the configuration
	 * 
	 * @param StoreConfig $request
	 * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
	 */
	public function store(StoreConfig $request)
	{
		$this->save($request->validated());
		
		return redirect(route('installation.database'));
	}
}
