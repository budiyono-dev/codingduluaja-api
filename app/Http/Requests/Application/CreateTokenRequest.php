<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;

class CreateTokenRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check();
    }

    public function rules(): array
    {
        return [
            'txtAppId' => 'required|numeric|exists:client_app,id',
            'txtResId' => 'required|numeric|exists:client_resource,id',
            'duration' => 'required|numeric|exists:expired_token,id',
        ];
    }
}
