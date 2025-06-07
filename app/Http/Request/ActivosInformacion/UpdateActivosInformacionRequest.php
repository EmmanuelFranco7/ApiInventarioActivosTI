<?php

namespace App\Http\Request\ActivosInformacion;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UpdateActivosInformacionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre_activo' => ['required', 'string', 'max:255'],
            'identificador' => ['required', 'string', 'max:100'],
            'descripcion' => ['nullable', 'string'],
            'acronimo' => ['nullable', 'string', 'max:20'],
            'version_inicial' => ['nullable', 'string', 'max:50'],
            'version_actual' => ['nullable', 'string', 'max:50'],
            'proveedor_id' => ['nullable', 'integer'],
            'url_acceso_interna' => ['nullable', 'url'],
            'url_acceso_externa' => ['nullable', 'url'],
            'tipo_adquisicion_id' => ['nullable', 'integer'],
            'tiene_derechos_patrimoniales' => ['required', 'boolean'],
            'ref_doc_derechos_patrim' => ['nullable', 'string', 'max:255'],
            'categoria_activo_id' => ['nullable', 'integer'],
            'categoria_otro_detalle' => ['nullable', 'string', 'max:255'],
            'fecha_licenciamiento_inicial' => ['nullable', 'date'],
            'fecha_licenciamiento_final' => ['nullable', 'date'],
            'numero_licencias' => ['nullable', 'integer'],
            'disponibilidad_sla_id' => ['nullable', 'integer'],
            'disponibilidad_otro_detalle' => ['nullable', 'string', 'max:255'],
            'estado_activo_id' => ['nullable', 'integer'],
            'fecha_inactivacion' => ['nullable', 'date'],
            'criticidad_interna_id' => ['nullable', 'integer'],
            'criticidad_externa_id' => ['nullable', 'integer'],
            'maneja_datos_personales' => ['required', 'boolean'],
            'tipo_dato_personal_id' => ['nullable', 'integer'],
            'valor_confidencialidad_id' => ['nullable', 'integer'],
            'valor_integridad_id' => ['nullable', 'integer'],
            'valor_disponibilidad_id' => ['nullable', 'integer'],
            'activo_datos_basicos_id' => ['nullable', 'integer'],
            'observaciones' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre_activo.required' => 'El nombre del activo es obligatorio.',
            'identificador.required' => 'El identificador es obligatorio.',
            'tiene_derechos_patrimoniales.required' => 'Debe indicar si tiene derechos patrimoniales.',
            'maneja_datos_personales.required' => 'Debe indicar si maneja datos personales.',
            // Mensajes adicionales personalizados si lo deseas
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
