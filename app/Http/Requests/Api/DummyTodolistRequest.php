<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class DummyTodolistRequest extends FormRequest
{

    public function authorize(): bool
    {
        // Log::info(request()->path());
        if(request()->is('api/*')) {
            return true;
        }
        return Auth::check();

    }

    public function rules(): array
    {
        return [
            'qty' => 'required|numeric|in:1,5,10'
        ];
    }
}
