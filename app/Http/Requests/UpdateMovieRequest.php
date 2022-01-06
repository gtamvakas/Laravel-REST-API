<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class UpdateMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'name' => 'string|max:255',
            'year' =>'numeric|digits:4|min:1900|max:2050',
            'director' =>'string|max:255',
            'protagonist' =>'string|max:255'
        ];
    }

    public function failedValidation(Validator $validator)
    {

        $errors = new ValidationException($validator);
        $errors = $errors->errors();
        throw new HttpResponseException(
            response()->json(['data' => $errors], Response::HTTP_UNPROCESSABLE_ENTITY)
        );


    }
}
