<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class GenerateTokenRequest extends FormRequest
{

    public function authorize(): bool
    {
        Log::info('check auth '. Auth::check());
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'client_app_id' => 'required',
            'client_resource_id' => 'required',
            'exp_id' => 'required'
        ];
    }
}
