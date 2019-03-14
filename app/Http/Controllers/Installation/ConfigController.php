<?php

namespace App\Http\Controllers\Installation;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigRequest;
use Illuminate\Contracts\View\View;
use App\Traits\Configurable;

class ConfigController extends Controller
{

	use Configurable;

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
	 * @param ConfigRequest $request
	 * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
	 */
	public function store(ConfigRequest $request)
	{
		$this->save($request->validated());
		
		return redirect(route('installation.database.index'));
	}
}
