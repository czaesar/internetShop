<?php

namespace App\Http\Requests\Api\Admin\Color;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class UpdateColorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    //    public function authorize(): bool
    //    {
    //        return false;
    //    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'regex:/^([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        $errorResponse = [];

        foreach ($errors->toArray() as $field => $fieldErrors) {
            $errorResponse[] = [
                'field' => $field,
                'errors' => $fieldErrors,
                'message' => 'Invalid '.$field.'.',
            ];
        }
        throw new HttpResponseException(response()->json($errorResponse, Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
