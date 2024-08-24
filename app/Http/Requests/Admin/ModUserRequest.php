<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ModUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|not_in:1,2|exists:users,id'
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.not_in' => 'User is locked'
        ];
    }
}
