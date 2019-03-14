<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;

class VerifyEmailNotification extends VerifyEmail
{
	/**
	 * The recipient user.
	 * 
	 * @var User
	 */
	private $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}
	
	/**
	 * Build the mail representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return \Illuminate\Notifications\Messages\MailMessage
	 */
	public function toMail($notifiable)
	{
		if (static::$toMailCallback) {
			return call_user_func(static::$toMailCallback, $notifiable);
		}

		config(['app.name' => config('server.name')]);

		return (new MailMessage)
		->subject(trans('emails/verify.subject', ['serverName' => config('server.name')]))
		->line(trans('emails/verify.thank_you', ['username' => $this->user->name]))
		->line(trans('emails/verify.click_the_button'))
		->action(trans('emails/verify.activate'), $this->verificationUrl($notifiable));
	}
}
