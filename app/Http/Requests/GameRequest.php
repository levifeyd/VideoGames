<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class GameRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'=>'required',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'success' => false,
            'message' => 'Validation error',
            'errors' => $validator->errors()
        ], 500);

        throw (new ValidationException($validator, $response))
            ->errorBag($this->errorBag);
    }
}
