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
            'name' => '',
            'nik' => '',
            'phone' => '',
            'email' => '',
            'img' => '',
            'address.country' => '',
            'address.state' => '',
            'address.city' => '',
            'address.postcode' => '',
            'address.detail' => '',
        ];
    }
}
