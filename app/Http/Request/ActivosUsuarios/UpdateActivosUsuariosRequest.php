<?php

namespace App\Http\Request\ActivosUsuarios;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateActivosUsuariosRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array {
        return [
            'activo_informacion_id' => ['required|integer'],
            'usuario_id' => ['required|integer'],
            'rol' => ['nullable|string|max:50'],
            'created_at' => ['nullable|date'],
            'updated_at' => ['nullable|date']
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
