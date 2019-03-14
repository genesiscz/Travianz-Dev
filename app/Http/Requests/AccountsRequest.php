<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountsRequest extends FormRequest
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
				'required' => trans('errors.required'),
				'integer' => trans('errors.integer'),
				'between' => trans('errors.between'),
				'min' => trans('errors.minimum'),
				'max' => trans('errors.maximum'),
				'regex' => trans('errors.password')
		];
	}
}
