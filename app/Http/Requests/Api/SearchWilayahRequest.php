<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SearchWilayahRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'search' => 'string',
            'provinsi_id' => 'string',
            'kabupaten_id' => 'string',
            'kecamatan_id' => 'string',
        ];
    }
}
