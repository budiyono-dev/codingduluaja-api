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
            'nik' => 'regex:/^[0-9]{16}$/',
            'phone' => 'string|max:20',
            'email' => 'required|email|ax:50',
            'address.country' => 'string|min:1|max:50',
            'address.state' => 'string|min:1|max:50',
            'address.city' => 'string|max:50',
            'address.postcode' => 'string|max:20',
            'address.detail' => 'string|max:255',
        ];
    }
}
