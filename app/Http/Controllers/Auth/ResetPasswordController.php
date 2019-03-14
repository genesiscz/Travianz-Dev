<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\TokenRequest;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
	use ResetsPasswords;

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
	 * Display the password reset view for the given token.
	 *
	 * If no token is present, display the link request form.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  string|null  $token
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function showResetForm(TokenRequest $request, $token = null)
	{
		return view('auth.passwords.reset')->with(
				['token' => $token, 'email' => $request->email]
		);
	}

	/**
	 * Reset the given user's password.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
	 */
	public function reset(ResetPasswordRequest $request)
	{
		$response = $this->broker()->reset(
				$this->credentials($request), function ($user, $password) {
					$this->resetPassword($user, $password);
				}
		);

		return $response == Password::PASSWORD_RESET
		? $this->sendResetResponse($request, $response)
		: $this->sendResetFailedResponse($request, $response);
	}
	
	/**
	 * Get the response for a failed password reset.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  string  $response
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
	 */
	protected function sendResetFailedResponse(Request $request, $response)
	{
		return redirect()->back()
		->withInput($request->only('email'))
		->withErrors(['token' => trans($response)]);
	}
	
	/**
	 * Where to redirect users after resetting their password.
	 *
	 * @var string
	 */
	public function redirectTo()
	{
		return route('login');
	}
}
