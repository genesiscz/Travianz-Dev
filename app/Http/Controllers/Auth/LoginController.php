<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\View\View;
use Carbon;
use App\Traits\TimeConvertible;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{

	use AuthenticatesUsers, TimeConvertible;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest')->except('logout');
		$this->middleware('auth')->only('logout');
	}
	
	/**
	 * Show the login view
	 * 
	 * @return View
	 */
	public function showLoginForm(): View
	{
		$serverStartCountdown = $this->secondsToTimeString(
				Carbon\Carbon::parse(config('server.start_date') . ' ' . config('server.start_time'))->diffInSeconds(now())
		);

		return view('auth.login', compact('serverStartCountdown'));
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	public function login(LoginRequest $request)
	{
		if ($this->hasTooManyLoginAttempts($request)) 
		{
			$this->fireLockoutEvent($request);
			
			return $this->sendLockoutResponse($request);
		}
		
		if ($this->attemptLogin($request)) 
		{
			if (!$this->guard()->user()->hasVerifiedEmail())
			{
				$this->guard()->logout();

				return $this->sendFailedLoginResponse($request, [
						'email' => [trans('auth/login.email_not_verified')],
				]);

			}
			elseif ($this->guard()->user()->vacation()->exists() && $this->guard()->user()->vacation->ended_at >= now())
			{
				$date = $this->guard()->user()->vacation->ended_at;
				
				$this->guard()->logout();
				
				return $this->sendFailedLoginResponse($request, [
						'vacation' => [
								trans('auth/login.still_on_vacation', [
										'date' => $date->toDateTimeString()
								])
						],
				]);
			}

			return $this->sendLoginResponse($request);
		}

		$this->incrementLoginAttempts($request);
		
		return $this->sendFailedLoginResponse($request, [
				'password' => [trans('errors.wrong', ['attribute' => trans('auth/login.password')])],
		]);
	}
	
	/**
	 * The user has been authenticated.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  User  $user
	 * @return mixed
	 */
	protected function authenticated(Request $request, User $user)
	{
		Cookie::queue(cookie('name', $user->name, 10080));
	}
	
	/**
	 * The user has logged out of the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return mixed
	 */
	protected function loggedOut(Request $request)
	{
		$request->session()->regenerateToken();

		return view('auth.logout');
	}
	
	/**
	 * Get the failed login response instance.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	protected function sendFailedLoginResponse(Request $request, array $errors)
	{
		throw ValidationException::withMessages($errors);
	}
	
	/**
	 * Delete all session cookies
	 */
	public function deleteCookies()
	{
		return redirect(route('login'))->withCookies([
				cookie('name', null, -1)
		]);
	}
	
	/**
	 * Where to redirect users after login.
	 *
	 * @return string
	 */
	public function redirectTo(): string
	{
		return route('fields');
	}

	/**
	 * Which authentication field will be used
	 * 
	 * @return string 
	 */
	public function username(): string
	{
		return 'name';
	}
}
