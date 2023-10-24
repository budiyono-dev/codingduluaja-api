<?php

namespace App\Http\Requests\Api;

use App\Constants\RegexConstant;
use App\Helper\ResponseHelper;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;


class CreateTodolistRequest extends FormRequest
{


    public function __construct(public ResponseHelper $responseHelper)
    {
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'date' => 'required|date|date_format:d-m-Y|after_or_equal:' . Carbon::today()->format('d-m-Y'),
            'name' => 'required|regex:'.RegexConstant::LETTER_SPACE,
            'description' => 'string|min:0|max:1000',
//            'name'=> 'required'
        ];
    }

//    public function failedValidation(Validator $validator)
//    {
//        throw new ValidationException(json_encode($validator->errors()->all()));
//    }
}
