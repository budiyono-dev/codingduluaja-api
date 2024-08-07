<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DummyTodolistRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();

    }

    public function rules(): array
    {
        return [
            'sel_qty' => 'required|numeric|in:1,5,10,20',
        ];
    }
}
