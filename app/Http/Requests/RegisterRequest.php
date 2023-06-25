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
            'last_name' => 'nullable',
            'email' => 'required|email|uniqie:users,email|max:50',
            'sex' =>  'nullable|in:male,female',
            'password' => 'required|min:8'

        ];
    }

    public function attributes(){
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
            
        ];
    }
}
