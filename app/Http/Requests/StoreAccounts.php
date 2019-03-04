<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccounts extends FormRequest
{

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules(): array
	{
		return [
				'multihunter.tribe' => 'required|integer|between:1,5', 
				'multihunter.password' => 'required|min:6|max:100|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()\-_=+{};:,<.>]).*$/', 
				'support.password' => 'required|min:6|max:100|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()\-_=+{};:,<.>]).*$/'
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
				'multihunter.tribe' => trans('tribes.tribe'),
				'multihunter.password' => trans('installation/accounts.password'),
				'support.password' => trans('installation/accounts.password'),
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
				'multihunter.tribe.required' => trans('errors.required'),
				'multihunter.tribe.integer' => trans('errors.integer'),
				'multihunter.tribe.between' => trans('errors.between'),
				'multihunter.password.required' => trans('errors.required'),
				'multihunter.password.min' => trans('errors.minimum'),
				'multihunter.password.max' => trans('errors.maximum'),
				'multihunter.password.regex' => trans('errors.password'),
				'support.password.required' => trans('errors.required'),
				'support.password.min' => trans('errors.minimum'),
				'support.password.max' => trans('errors.maximum'),
				'support.password.regex' => trans('errors.password'),
		];
	}
}
