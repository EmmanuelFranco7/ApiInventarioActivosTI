<?php

namespace App\Http\Request\ActivoArchivo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreActivoArchivoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'activo_informacion_id' => ['required', 'integer', 'exists:activos_informacion,id'],
            'tipo' => ['required', 'integer'], // Validar contra catálogo si aplica
            'directorio' => ['nullable', 'string', 'max:512'],
            'url' => ['nullable', 'url', 'max:255'],
            'descripcion' => ['nullable', 'string'],
            'observaciones' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'activo_informacion_id.required' => 'El campo activo_informacion_id es obligatorio.',
            'activo_informacion_id.exists' => 'El activo_informacion_id debe existir en la tabla activos_informacion.',
            'tipo.required' => 'El campo tipo es obligatorio.',
            'tipo.integer' => 'El tipo debe ser un valor numérico.',
            'url.url' => 'El campo url debe ser una URL válida.',
            'directorio.max' => 'El directorio no puede superar los 512 caracteres.',
            'url.max' => 'La URL no puede superar los 255 caracteres.',
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
