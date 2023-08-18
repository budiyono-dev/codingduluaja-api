<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAppClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth:check();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|alpha:ascii',
            'expired' => 'required|date'
        ];
    }
}
