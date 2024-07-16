<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditMenuAccessRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
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
