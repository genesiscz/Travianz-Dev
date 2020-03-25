<?php

namespace App\Http\Controllers\Auth;

use App\Models\Building;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmailSendRequest;
use App\Models\WorldLoyalty;
use App\Traits\TimeConvertible;
use App\Models\Village;
use App\Models\World;
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
     * @param User $id
     * @return \Illuminate\Http\Response
     */
	public function verify(User $id)
	{
		if ($id->hasVerifiedEmail()) {
			return redirect($this->redirectPath());
		}


		if ($id->markEmailAsVerified()) {
			event(new Verified($id));

			// Create Starter village
            $worldstart = (new \App\Models\World)->findStarterTiles();

            $village = @Village::create(['world_id' => $worldstart->id,'user_id' => $id->getAttribute('id'),
                'name' => $id->getAttribute('name')." Village",
                'capital' => 1,
            ]);

            $id->selectedVillage()->create(['user_id' => $id->getAttribute('id'),'village_id' => $worldstart->id]);
            (new \App\Models\World)->setFieldtaken($worldstart->id);
            (new WorldLoyalty)->create(['world_id' => $worldstart->id]);
            (new \App\Models\Preference)->create(['user_id' => $id->getAttribute('id')]);
            (new \App\Models\Profile)->create(['user_id' => $id->getAttribute('id')]);
            (new \App\Models\WorldResource)->create(['world_id' => $worldstart->id,'type' => 0]);
            (new \App\Models\WorldResource)->create(['world_id' => $worldstart->id,'type' => 1]);
            (new \App\Models\WorldResource)->create(['world_id' => $worldstart->id,'type' => 2]);
            (new \App\Models\WorldResource)->create(['world_id' => $worldstart->id,'type' => 3]);
            foreach (Village::VILLAGE_CREATE_FIELD_TYPES[3] as $key=>$value)
                Building::create(['village_id' => $village->world_id, 'location' => $key, 'type' => $value, 'level' => $value==15 ? 1 : 0]);
            }
            $id->ranking()->create();

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
