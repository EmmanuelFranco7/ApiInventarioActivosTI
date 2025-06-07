<?php

namespace App\Http\Request\ActivoInterfaz;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateActivoInterfazRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array {
        return [
            'activo_informacion_id' => ['required', 'integer', 'exists:activo_informacion,id'],
            'tipo_interfaz_id' => ['required', 'integer', 'exists:tipos_interfaz,id'],
        ];
    }

    public function messages(): array {
        return [
            'activo_informacion_id.required' => 'El campo activo_informacion_id es obligatorio.',
            'activo_informacion_id.exists' => 'El activo informado no existe.',
            'tipo_interfaz_id.required' => 'El campo tipo_interfaz_id es obligatorio.',
            'tipo_interfaz_id.exists' => 'El tipo de interfaz no existe.',
        ];
    }

    protected function failedValidation(Validator $validator): void {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'message' => 'Error al validar los datos.'
        ], 422));
    }
}
