<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class RuleController extends Controller
{
	/**
	 * Show the rules view
	 * 
	 * @return View
	 */
	public function index(): View
	{
		return view('rules');
	}
}
