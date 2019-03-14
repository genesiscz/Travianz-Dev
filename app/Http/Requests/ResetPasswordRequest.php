<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ResetPasswordRequest extends FormRequest
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
        		'token' => 'required',
            'email' => 'required|min:6|max:30|email|exists:user',
        		'password' => 'required|min:6|max:100|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()\-_=+{};:,<.>]).*$/|confirmed'
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
    			'token' => trans('auth/passwords/reset.token'),
    			'email' => trans('auth/passwords/reset.email'),
    			'password' => trans('auth/passwords/reset.password'),
    			'password_confirmation' => trans('auth/passwords/reset.password_confirmation'),
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
    			'min' => trans('errors.min'),
    			'max' => trans('errors.max'),
    			'confirmed' => trans('errors.confirmed'),
    			'regex' => trans('errors.password'),
    			'email' => trans('errors.email')
    	];
    }
}
