<?php

namespace App\Http\Request\Tecnologia;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreTecnologiaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre_tecnologia' => ['required', 'string', 'max:100'],
            'version' => ['required', 'string', 'max:50'],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_tecnologia.required' => 'El campo nombre_tecnologia es obligatorio.',
            'nombre_tecnologia.string' => 'El nombre_tecnologia debe ser una cadena de texto.',
            'nombre_tecnologia.max' => 'El nombre_tecnologia no puede superar los 100 caracteres.',
            'version.required' => 'El campo version es obligatorio.',
            'version.string' => 'La version debe ser una cadena de texto.',
            'version.max' => 'La version no puede superar los 50 caracteres.',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'message' => 'Error al procesar el formulario. Por favor corrija los errores indicados.'
        ], 422));
    }
}
