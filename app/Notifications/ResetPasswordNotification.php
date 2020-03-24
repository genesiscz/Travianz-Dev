<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends ResetPassword
{
	/**
	 * Build the mail representation of the notification.
	 *
	 * @param  mixed  $notifiable
	 * @return MailMessage
	 */
	public function toMail($notifiable)
	{
		if (static::$toMailCallback) {
			return call_user_func(static::$toMailCallback, $notifiable, $this->token);
		}

		config(['app.name' => config('server.name')]);

		return (new MailMessage)
		->subject(trans('emails/password.subject'))
		->line(trans('emails/password.reset_password_request', ['serverName' => config('server.name')]))
		->action(trans('emails/password.reset_password'), route('password.reset', ['token' => $this->token]))
		->line(trans('emails/password.expire', ['count' => config('auth.passwords.users.expire')]))
		->line(trans('emails/password.not_requested'));
	}
}
