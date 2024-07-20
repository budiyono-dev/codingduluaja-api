<?php

namespace App\Http\Requests\Api;

use App\Constants\RegexConstant;
use App\Helper\ResponseHelper;
use Illuminate\Foundation\Http\FormRequest;

class EditTodolistRequest extends FormRequest
{
    public function __construct(public ResponseHelper $responseHelper) {}

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date' => 'required|date|date_format:d-m-Y',
            'name' => 'required|max:50|regex:'.RegexConstant::LETTER_SPACE,
            'description' => 'string|min:0|max:1000',
        ];
    }
}
