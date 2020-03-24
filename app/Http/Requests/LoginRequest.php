<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
    	return !Auth::check() && now() >= Carbon::parse(config('server.start_date') . ' ' . config('server.start_time'));;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:30|exists:user,name',
        		'password' => 'required|min:8|max:100'
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
    			'name' => trans('auth/login.username'),
    			'password' => trans('auth/login.password')
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
    			'max' => trans('errors.max')
    	];
    }
}
