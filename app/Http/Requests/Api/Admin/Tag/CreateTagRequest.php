<?php

namespace App\Http\Requests\Api\Admin\Tag;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class CreateTagRequest extends FormRequest
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
            'name' => 'required|string|max:255',
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
