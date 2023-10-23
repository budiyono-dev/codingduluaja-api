<?php

namespace App\Http\Requests\Api;

use App\Helper\ResponseHelper;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'name' => 'required|alpha:ascii',
//            'description' => ''
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->responseHelper->validationErrorResponse('CDA_R14', $validator->errors()->all()));
    }
}
