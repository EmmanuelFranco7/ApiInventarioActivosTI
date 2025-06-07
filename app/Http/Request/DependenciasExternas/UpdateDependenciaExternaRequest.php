<?php

namespace App\Http\Request\DependenciasExternas;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateDependenciaExternaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'activo_informacion_id' => ['required', 'exists:activos_informacion,id'],
            'nombre_dependencia' => ['required', 'string', 'max:255'],
            'licenciamiento' => ['nullable', 'string'],
            'descripcion_uso' => ['nullable', 'string'],
            'observaciones' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'activo_informacion_id.required' => 'Debe asociar un activo.',
            'activo_informacion_id.exists' => 'El activo seleccionado no existe.',

            'nombre_dependencia.required' => 'Debe llenar este campo.',
            'nombre_dependencia.string' => 'Debe enviar una cadena de texto.',
            'nombre_dependencia.max' => 'Máximo 255 caracteres.',

            'licenciamiento.string' => 'Debe enviar una cadena de texto.',
            'descripcion_uso.string' => 'Debe enviar una cadena de texto.',
            'observaciones.string' => 'Debe enviar una cadena de texto.',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'message' => 'Error al procesar el formulario. Por favor corrija los errores indicados.',
        ], 422));
    }
}
