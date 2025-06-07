<?php

namespace App\Http\Request\Proveedores;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateProveedoresRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre_proveedor'   => ['required', 'string', 'max:255'],
            'contacto_nombre'    => ['nullable', 'string', 'max:100'],
            'contacto_cargo'     => ['nullable', 'string', 'max:100'],
            'contacto_email'     => ['nullable', 'email', 'max:100'],
            'direccion'          => ['nullable', 'string', 'max:255'],
            'ciudad'             => ['nullable', 'string', 'max:100'],
            'telefono'           => ['nullable', 'string', 'max:50'],
            'celular'            => ['nullable', 'string', 'max:50'],
            'email_soporte'      => ['nullable', 'email', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_proveedor.required' => 'El nombre del proveedor es obligatorio.',
            'nombre_proveedor.max'      => 'Máximo 255 caracteres.',
            'contacto_email.email'      => 'El correo de contacto debe ser válido.',
            'contacto_email.max'        => 'Máximo 100 caracteres para el email de contacto.',
            'email_soporte.email'       => 'El correo de soporte debe ser válido.',
            'email_soporte.max'         => 'Máximo 255 caracteres para el correo de soporte.',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'message' => 'Error al validar los datos.'
        ], 422));
    }
}
