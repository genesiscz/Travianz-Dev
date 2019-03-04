<?php

namespace App\Http\Controllers\Installation;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class InstallationController extends Controller
{
	/**
	 * Show the installation greetings
	 *
	 * @return View
	 */
	public function greetings(): View
	{
		return view('installation.greetings');
	}
	
	/**
	 * Show the installation finish
	 *
	 * @return View
	 */
	public function finish(): View
	{
		return view('installation.finish');
	}
}
