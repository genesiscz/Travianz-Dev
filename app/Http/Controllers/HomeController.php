<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Preference;
use App\Models\Village;
use Illuminate\Contracts\View\View;
use App\Models\User;

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
		$activeUsers = $users->where('updated_at', '>=', now()->subDay())->count();
		$onlineUsers = $users->where('updated_at', '>=', now()->subMinutes(5))->count();

		return view('index', compact('totalUsers', 'activeUsers', 'onlineUsers'));
	}

    public function testit(){

       (new Preference)->create(['user_id'=>1]);
    }
}
