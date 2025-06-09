<?php

namespace App\Http\Request\ActivoTecnologia;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreActivoTecnologiaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'activo_informacion_id' => ['required', 'integer', 'exists:activos_informacion,id'],
            'tecnologia_id' => ['required', 'integer', 'exists:tecnologias,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'activo_informacion_id.required' => 'El campo activo_informacion_id es obligatorio.',
            'activo_informacion_id.integer' => 'El campo activo_informacion_id debe ser un número entero.',
            'activo_informacion_id.exists' => 'El activo_informacion_id debe existir en la tabla activos_informacion.',
            'tecnologia_id.required' => 'El campo tecnologia_id es obligatorio.',
            'tecnologia_id.integer' => 'El campo tecnologia_id debe ser un número entero.',
            'tecnologia_id.exists' => 'El tecnologia_id debe existir en la tabla tecnologias.',
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
