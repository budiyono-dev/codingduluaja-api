<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class DummyTodolistRequest extends FormRequest
{

    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'qty' => ['required', 'number', Rule::in([1, 5, 10])]
        ];
    }
}
