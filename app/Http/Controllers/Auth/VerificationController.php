<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmailSendRequest;
use App\Traits\TimeConvertible;
use Carbon\Carbon;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
	use VerifiesEmails, TimeConvertible;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
		$this->middleware('signed')->only('verify');
		$this->middleware('throttle:15,1')->only('verify', 'resend');
	}

	public function show()
	{
		$serverStartCountdown = $this->secondsToTimeString(
				Carbon::parse(config('server.start_date') . ' ' . config('server.start_time'))->diffInSeconds(now())
		);
		
		return view('auth.verify', compact('serverStartCountdown'));
	}
	
	/**
	 * Mark the authenticated user's email address as verified.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  User $user
	 * 
	 * @return \Illuminate\Http\Response
	 * @throws \Illuminate\Auth\Access\AuthorizationException
	 */
	public function verify(User $id)
	{
		if ($id->hasVerifiedEmail()) {
			return redirect($this->redirectPath());
		}
		
		if ($id->markEmailAsVerified()) {
			event(new Verified($id));
		}
		
		return redirect($this->redirectPath())->with('verified', true);
	}
	
	/**
	 * Resend the email verification notification.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function resend(EmailSendRequest $request)
	{
		if (($user = User::where('email', $request->validated()['email'])->first())->hasVerifiedEmail()) {
			return redirect($this->redirectPath());
		}
		
		$user->sendEmailVerificationNotification();
		
		return back()->with('resent', true);
	}
	
	/**
	 * Where to redirect users after email verification.
	 *
	 * @var string
	 */
	protected function redirectTo()
	{
		return route('login');
	}
}
