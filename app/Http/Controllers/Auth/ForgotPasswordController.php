<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailSendRequest;
use App\Traits\TimeConvertible;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails, TimeConvertible;

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
     * Display the form to request a password reset link.
     *
     * @return Response
     */
    public function showLinkRequestForm()
    {
    	$serverStartCountdown = $this->secondsToTimeString(
    			Carbon::parse(config('server.start_date') . ' ' . config('server.start_time'))->diffInSeconds(now())
    	);
    	
    	return view('auth.passwords.email', compact('serverStartCountdown'));
    }
    
    /**
     * Get the response for a successful password reset link.
     *
     * @param Request $request
     * @param  string  $response
     * @return RedirectResponse|JsonResponse
     */
    protected function sendResetLinkResponse(Request $request, $response)
    {
    	return redirect(route('login'))->with('resetPassword', trans($response));
    }

    /**
     * Send a reset link to the given user.
     *
     * @param EmailSendRequest $request
     * @return RedirectResponse|JsonResponse
     */
    public function sendResetLinkEmail(EmailSendRequest $request)
    {
    	$response = $this->broker()->sendResetLink($request->only('email'));
    	
    	return $response == Password::RESET_LINK_SENT
    	? $this->sendResetLinkResponse($request, $response)
    	: $this->sendResetLinkFailedResponse($request, $response);
    }
}
