<?php

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use \Carbon\Carbon;
use App\User;

class HomeController extends Controller
{

	/**
	 * Show the index of the game
	 * 
	 * @return View
	 */
	public function index(): View
	{		
		$users = User::all();

		$totalUsers = $users->count();
		$activeUsers = $users->where('updated_at', '>=', Carbon::now()->subDay())->count();
		$onlineUsers = $users->where('updated_at', '>=', Carbon::now()->subMinutes(5))->count();

		return view('index', compact('totalUsers', 'activeUsers', 'onlineUsers'));
	}
}
