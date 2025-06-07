<?php

namespace App\Http\Request\ActivoSoporteTecnico;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateActivoSoporteTecnicoRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array {
        return [
            'usuario_id' => ['required|integer'],
            'proveedor_id' => ['required|integer'],
            'activo_informacion_id' => ['required|integer'],
            'dependencia_id' => ['nullable|integer'],
            'tiene_plataforma' => ['boolean'],
            'disponibilidad_sla_id' => ['required|integer'],
            'fecha_vencimiento' => ['date'],
            'observaciones' => ['nullable|string'],
            'email' => ['nullable|email'],
            'telefono' => ['nullable|string|max:15'],
            'ciudad_id' => ['nullable|integer']
        ];
    }

    public function messages(): array {
        return [];
    }

    protected function failedValidation(Validator $validator): void {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'message' => 'Error al validar los datos.'
        ], 422));
    }
}
