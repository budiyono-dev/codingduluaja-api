<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMenuAccessRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'txtName' => 'required|string|min:3|unique:menu_access,name',
            'txtDescription' => 'required|string|min:3',
            'cbItems' => 'array',
        ];
    }
}
