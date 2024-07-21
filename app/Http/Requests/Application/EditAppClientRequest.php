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
            'txtId' => 'required|exist:client_app,id',
            'txtName' => 'required|string|min:3',
            'txtDescription' => 'required|string|min:3',
        ];
    }
}
