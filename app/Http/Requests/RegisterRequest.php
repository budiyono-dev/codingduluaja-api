<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|min:3|max:50',
            'last_name' => 'nullable|min:3|max:50',
            'email' => 'required|email|unique:users,email|max:50',
            'sex' => 'nullable|in:male,female',
            'password' => 'required|confirmed|min:8'
        ];
    }

    public function attributes(): array
    {
        return [
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }


    public function messages(): array
    {
        return [
            'first_name.required' => __('validation.required'),
            'first_name.min' => __('validation.min'),
            'first_name.max' => __('validation.max'),
            'last_name.min' => __('validation.min'),
            'last_name.max' => __('validation.max'),
            'email.required' => __('validation.required'),
            'email.email' => __('validation.email'),
            'email.unique' => __('validation.unique'),
            'email.max' => __('validation.max'),
            'sex.in' => __('validation.in'),
            'password.required' => __('validation.required'),
            'password.min' => __('validation.min')

        ];
    }
}
