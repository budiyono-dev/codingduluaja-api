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
            'txtAppId' => 'required|numeric|exists:app_client,id',
            'txtResId' => 'required|numeric|exists:client_resource,id',
            'selExp' => 'required|numeric|exists:expired_token,id',
        ];
    }
}
