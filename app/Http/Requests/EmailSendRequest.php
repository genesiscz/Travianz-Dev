<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EmailSendRequest extends FormRequest
{

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return !Auth::check() && now() >= Carbon::parse(config('server.start_date') . ' ' . config('server.start_time'));
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [ 
				'email' => 'required|email|min:6|max:100|exists:user'
		];
	}
	
	/**
	 * Get custom attributes for validator errors.
	 *
	 * @return array
	 */
	public function attributes(): array
	{
		return [
				'email' => trans('auth/verify.email'),
		];
	}
	
	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public function messages(): array
	{
		return [
				'required' => trans('errors.required'),
				'exists' => trans('errors.exists'),
				'email' => trans('errors.email'),
				'min' => trans('errors.min'),
				'max' => trans('errors.max')
		];
	}
}
