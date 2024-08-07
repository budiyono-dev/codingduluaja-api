<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class GetTokenRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'txtAppId' => 'required|numeric|exists:client_app,id',
            'txtResId' => 'required|numeric|exists:client_resource,id',
        ];
    }
}
