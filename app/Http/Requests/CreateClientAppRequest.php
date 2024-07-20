<?php

namespace App\Http\Requests;

use App\Constants\RegexConstant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateClientAppRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'name' => 'required|regex:'.RegexConstant::COMBINATION_1,
        ];
    }
}
