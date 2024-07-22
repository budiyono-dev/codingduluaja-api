<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ConnectedAppRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'selApp' => 'required|numeric|exists:client_app,id',
            'txtResourceId' => 'required|numeric|exists:client_resource,id',
        ];
    }
}
