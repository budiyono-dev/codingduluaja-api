<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class SearchUserApiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'search' => 'string|min:1',
            'order_by' => 'string|in:name,created_at,updated_at',
            'search_by' => 'string|in:name,nik,phone,email',
            'order_direction' => 'string|in:desc,asc'
        ];
    }
}
