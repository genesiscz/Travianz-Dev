<?php

namespace App\Http\Controllers\Installation;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfigRequest;
use Illuminate\Contracts\View\View;
use App\Traits\Configurable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

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
	 * @return Redirector|RedirectResponse
	 */
	public function store(ConfigRequest $request)
	{
		$this->save($request->validated());
		
		return redirect(route('installation.database.index'));
	}
}
