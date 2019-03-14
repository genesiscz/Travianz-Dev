<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TokenRequest extends FormRequest
{

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return !Auth::check();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
				'token' => 'required|size:64'
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
				'token' => trans('auth/passwords/reset.token')
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
				'size' => trans('errors.invalid')
		];
	}
	
	/**
	 * Get all of the input and files for the request.
	 *
	 * @param  array|mixed  $keys
	 * @return array
	 */
	public function all($keys = null)
	{
		$data = parent::all($keys);
		$data['token'] = $this->route('token');

		return $data;
	}
}
