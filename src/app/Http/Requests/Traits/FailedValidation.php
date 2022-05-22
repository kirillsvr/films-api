<?php
namespace App\Http\Requests\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait FailedValidation
{
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 417,
            'developerMessage' => 'Validation errors',
            'userMessage' => 'Validation errors',
            'data' => $validator->errors()
        ]));
    }
}
