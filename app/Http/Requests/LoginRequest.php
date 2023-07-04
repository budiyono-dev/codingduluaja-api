<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required',
            'password' => 'required'
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

//    public function messages(): array
//    {
//        return [
//            'first_name.required' => __('validation.required'),
//            'first_name.min' => __('validation.min'),
//            'first_name.max' => __('validation.max'),
//            'last_name.min' => __('validation.min'),
//            'last_name.max' => __('validation.max'),
//            'email.required' => __('validation.required'),
//            'email.email' => __('validation.email'),
//            'email.unique' => __('validation.unique'),
//            'email.max' => __('validation.max'),
//            'sex.in' => __('validation.in'),
//            'password.required' => __('validation.required'),
//            'password.min' => __('validation.min')
//
//        ];
//    }
}
