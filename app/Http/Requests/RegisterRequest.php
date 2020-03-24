<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return !Auth::check() && config('server.registrations_open');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        		'name' => 'required|min:3|max:30|unique:user,name',
        		'email' => 'required|email|min:6|max:100|unique:user',
        		'password' => 'required|min:8|max:100|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()\-_=+{};:,<.>]).*$/|confirmed',
        		'tribe' => 'required|integer|between:1,3',
        		'sector' => 'required|integer|between:0,4',
        		'rules' => 'accepted',
        		'referral' => 'sometimes|required|integer|exists:user,id'
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
    			'name' => trans('auth/register.username'),
    			'email' => trans('auth/register.email'),
    			'password' => trans('auth/register.password'),
    			'tribe' => trans('tribes.tribe'),
    			'sector' => trans('auth/register.sectors.title'),
    			'rules' => trans('auth/register.rules'),
    			'referral' => trans('auth/register.referral')
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
    			'unique' => trans('errors.unique'),
    			'between' => trans('errors.invalid'),
    			'integer' => trans('errors.invalid'),
    			'email' => trans('errors.email'),
    			'confirmed' => trans('errors.confirmed'),
    			'min' => trans('errors.minimum'),
    			'max' => trans('errors.maximum'),
    			'accepted' => trans('errors.accepted'),
    			'regex' => trans('errors.password')
    	];
    }
}
