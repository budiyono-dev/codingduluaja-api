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
            'username' => 'required|min:3',
            'email' => 'required|email|unique:users,email|max:50',
            'sex' => 'nullable|in:male,female',
            'password' => 'required|confirmed|min:8'
        ];
    }
}
