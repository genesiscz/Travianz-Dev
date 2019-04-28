<?php

namespace App\Http\Controllers\Installation;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\AccountsRequest;
use App\Models\User;

class AccountController extends Controller
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
	 * @param AccountsRequest $request
	 * @return Redirector|RedirectResponse
	 */
	public function store(AccountsRequest $request)
	{
		User::create([
				'name' => 'Support',
				'email' => 'support@' . config('server.name') . '.com',
				'password' => Hash::make($request->validated()['support']['password']),
				'tribe' => 0,
				'type' => 1
		]);
		
		$multihunter = User::create([
				'name' => 'Multihunter',
				'email' => 'multihunter@' . config('server.name') . '.com',
				'password' => Hash::make($request->validated()['multihunter']['password']),
				'tribe' => $request->validated()['multihunter']['tribe'],
				'type' => 1
		]);

		$multihunter->addRanking();
		
		return redirect(route('installation.finish'));
	}
}
