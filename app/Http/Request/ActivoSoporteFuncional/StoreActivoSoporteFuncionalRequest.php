<?php

namespace App\Http\Request\ActivoSoporteFuncional;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreActivoSoporteFuncionalRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'usuario_id' => ['required', 'integer', 'exists:usuarios,id'],
            'proveedor_id' => ['required', 'integer', 'exists:proveedores,id'],
            'activo_informacion_id' => ['required', 'integer', 'exists:activos_informacion,id'],
            'dependencia_id' => ['nullable', 'integer', 'exists:dependencias,id'],
            'tiene_plataforma' => ['nullable', 'boolean'],
            'plataforma_detalle' => ['nullable', 'string', 'max:255'],
            'disponibilidad_sla_id' => ['nullable', 'integer', 'exists:disponibilidades_sla,id'],
            'fecha_vencimiento' => ['nullable', 'date'],
            'observaciones' => ['nullable', 'string'],
            'email' => ['nullable', 'email', 'max:300'],
            'celular' => ['nullable', 'string', 'max:15'],
            'telefono' => ['nullable', 'string', 'max:15'],
            'direccion' => ['nullable', 'string'],
            'ciudad_id' => ['nullable', 'integer', 'exists:ciudades,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'usuario_id.required' => 'El campo usuario_id es obligatorio.',
            'usuario_id.exists' => 'El usuario especificado no existe.',
            'proveedor_id.required' => 'El campo proveedor_id es obligatorio.',
            'proveedor_id.exists' => 'El proveedor especificado no existe.',
            'activo_informacion_id.required' => 'El campo activo_informacion_id es obligatorio.',
            'activo_informacion_id.exists' => 'El activo informado no existe.',
            'dependencia_id.exists' => 'La dependencia especificada no existe.',
            'disponibilidad_sla_id.exists' => 'La disponibilidad SLA especificada no existe.',
            'ciudad_id.exists' => 'La ciudad especificada no existe.',
            'email.email' => 'Debe ingresar un correo electrónico válido.',
            'email.max' => 'El correo electrónico no debe exceder los 300 caracteres.',
            'celular.max' => 'El celular no debe tener más de 15 caracteres.',
            'telefono.max' => 'El teléfono no debe tener más de 15 caracteres.',
            'plataforma_detalle.max' => 'La descripción de la plataforma no debe superar los 255 caracteres.',
            'fecha_vencimiento.date' => 'La fecha de vencimiento debe tener un formato válido.',
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
