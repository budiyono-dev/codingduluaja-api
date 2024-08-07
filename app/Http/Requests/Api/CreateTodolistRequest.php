<?php

namespace App\Http\Requests\Api;

use App\Constants\RegexConstant;
use App\Helper\ResponseHelper;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class CreateTodolistRequest extends FormRequest
{
    public function __construct(public ResponseHelper $responseHelper) {}

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date' => 'required|date|date_format:Y-m-d|after_or_equal:'.Carbon::today()->format('Y-m-d'),
            'name' => 'required|max:50|regex:'.RegexConstant::LETTER_SPACE,
            'description' => 'string|min:0|max:1000',
        ];
    }
}
