<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class TutorialController extends Controller
{
	/**
	 * Show the village tutorial
	 *
	 * @return View
	 */
	public function village(): View
	{
		return view('tutorial.village');
	}
	
	/**
	 * Show the resources tutorial
	 *
	 * @return View
	 */
	public function resources(): View
	{
		return view('tutorial.resources');
	}
	
	/**
	 * Show the buildings tutorial
	 *
	 * @return View
	 */
	public function buildings(): View
	{
		return view('tutorial.buildings');
	}
	
	/**
	 * Show the neighbours tutorial
	 *
	 * @return View
	 */
	public function neighbours(): View
	{
		return view('tutorial.neighbours');
	}
	
	/**
	 * Show the navigation tutorial
	 *
	 * @return View
	 */
	public function navigation(): View
	{
		return view('tutorial.navigation');
	}
}
