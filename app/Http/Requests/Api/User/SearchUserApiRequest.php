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
            'search' => 'nullable|string|min:1',
            'order_by' => 'nullable|string|in:name,created_at,updated_at',
            'search_by' => 'nullable|string|in:name,nik,phone,email',
            'order_direction' => 'nullable|string|in:desc,asc',
            'page_size' => 'nullable|integer|in:3,5,10,20',
        ];
    }
}
