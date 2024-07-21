<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class EditMenuAccessRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'id' => 'required|exists:menu_access,id',
            'txtDescription' => 'required|string|min:3',
            'cbItems' => 'array',
        ];
    }
}
