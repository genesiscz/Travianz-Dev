<?php

namespace App\Http\Controllers\Installation;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccounts;
use App\Ranking;
use App\User;

class AccountsController extends Controller
{
	/**
	 * Show the database view
	 *
	 * @return View
	 */
	public function index(): View
	{
		return view('installation.accounts');
	}
	
	/**
	 * Store structure
	 *
	 * @param Request $request
	 * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
	 */
	public function store(StoreAccounts $request)
	{
		User::create([
				'email' => 'support@' . config('server.name') . '.com',
				'username' => 'Support',
				'password' => $request->validated()['support']['password'],
				'tribe' => 0,
				'access_level' => 3
		]);
		
		$multihunter = User::create([
				'email' => 'multihunter@' . config('server.name') . '.com',
				'username' => 'Multihunter',
				'password' => $request->validated()['multihunter']['password'],
				'tribe' => $request->validated()['multihunter']['tribe'],
				'access_level' => 3
		]);
		
		$multihunterRanking = Ranking::create();

		$multihunter->userRanking()->create(['user_id' => $multihunter->id, 'ranking_id' => $multihunterRanking->id]);
		
		return redirect(route('installation.finish'));
	}
}
