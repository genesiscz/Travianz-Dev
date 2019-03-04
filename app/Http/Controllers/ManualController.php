<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ManualController extends Controller
{

	/**
	 * Show the tribes manual
	 * 
	 * @return View
	 */
	public function tribes(): View
	{
		return view('manual.tribes');
	}
	
	/**
	 * Show the buildings manual
	 *
	 * @return View
	 */
	public function buildings(): View
	{
		return view('manual.buildings');
	}
	
	/**
	 * Show the game faq
	 *
	 * @return View
	 */
	public function faq(): View
	{
		return view('manual.FAQ');
	}
	
	/**
	 * Show the village manual
	 *
	 * @return View
	 */
	public function village(): View
	{
		return view('manual.village');
	}
}
