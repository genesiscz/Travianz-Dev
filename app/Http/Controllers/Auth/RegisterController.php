<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
	use RegistersUsers;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}
	
	/**
	 * Show the application registration form.
	 * 
	 * @param User $referral
	 */
	public function showRegistrationForm(?User $referral = null)
	{
		return view('auth.register', compact('referral'));
	}

	/**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param User $referral
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request, ?User $referral = null)
    {
        event(new Registered($user = $this->create($request->all(), $referral)));

        return $this->registered($request, $user) ?: redirect($this->redirectPath());
    }

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param array $data
	 * @param User $referral
	 * 
	 * @return User
	 */
	protected function create(array $data, ?User $referral = null)
	{
		$user = User::create([
				'name' => $data['name'],
				'email' => $data['email'], 
				'password' => Hash::make($data['password']),
				'tribe' => $data['tribe'],
				'map_sector' => $data['sector']
		]);

		$user->ranking()->create();

		if ($referral !== null) $user->referral()->create(['user_id' => $user->id, 'referral_user_id' => $referral->id]);
		
		return $user;
	}

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected function redirectTo(): string
	{
		return route('login');
	}
}
