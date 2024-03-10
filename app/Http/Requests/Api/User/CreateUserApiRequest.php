<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserApiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|min:1|max:50',
            'nik' => 'nullable|string|regex:/^[0-9]{16}$/',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email|ax:50',
            'address.country' => 'nullable|string|min:1|max:50',
            'address.state' => 'nullable|string|min:1|max:50',
            'address.city' => 'nullable|string|max:50',
            'address.postcode' => 'nullable|string|max:20',
            'address.detail' => 'nullable|string|max:255',
        ];
    }
}
