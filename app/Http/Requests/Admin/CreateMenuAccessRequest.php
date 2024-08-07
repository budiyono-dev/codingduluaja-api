<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateMenuAccessRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
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
