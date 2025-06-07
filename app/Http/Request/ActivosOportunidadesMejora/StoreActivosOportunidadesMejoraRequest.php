<?php

namespace App\Http\Request\ActivosOportunidadesMejora;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreActivosOportunidadesMejoraRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'activo_informacion_id' => ['required', 'integer'],
            'descripcion' => ['required', 'string', 'max:500'],
        ];
    }

    public function messages(): array
    {
        return [
            'activo_informacion_id.required' => 'El campo activo_informacion_id es obligatorio.',
            'activo_informacion_id.integer' => 'Debe ser un número entero.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.string' => 'Debe ser una cadena de texto.',
            'descripcion.max' => 'Debe tener como máximo 500 caracteres.',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        $response = response()->json([
            'errors' => $validator->errors(),
            'message' => 'Error al procesar el formulario. Por favor corrija los errores indicados.'
        ], 422);

        throw new HttpResponseException($response);
    }
}
