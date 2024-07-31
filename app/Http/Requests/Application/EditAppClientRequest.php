<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EditAppClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'txtId' => 'required|exists:client_app,id',
            'application_name' => 'required|string|min:3',
            'description' => 'required|string|min:3',
        ];
    }
}
