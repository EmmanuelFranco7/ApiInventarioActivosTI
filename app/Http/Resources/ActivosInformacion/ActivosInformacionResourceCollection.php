<?php

namespace App\Http\Resources\ActivosInformacion;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ActivosInformacionResourceCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        $data = [
            'data' => $this->collection->transform(function ($entity) {
                return [
                    'id' => $entity->id,
                    'nombre_activo' => $entity->nombre_activo,
                    'identificador' => $entity->identificador,
                    'descripcion' => $entity->descripcion,
                    'acronimo' => $entity->acronimo,
                    'version_inicial' => $entity->version_inicial,
                    'version_actual' => $entity->version_actual,
                    'proveedor_id' => $entity->proveedor_id,
                    'url_acceso_interna' => $entity->url_acceso_interna,
                    'url_acceso_externa' => $entity->url_acceso_externa,
                    'tipo_adquisicion_id' => $entity->tipo_adquisicion_id,
                    'tiene_derechos_patrimoniales' => $entity->tiene_derechos_patrimoniales,
                    'ref_doc_derechos_patrim' => $entity->ref_doc_derechos_patrim,
                    'categoria_activo_id' => $entity->categoria_activo_id,
                    'categoria_otro_detalle' => $entity->categoria_otro_detalle,
                    'fecha_licenciamiento_inicial' => $entity->fecha_licenciamiento_inicial,
                    'fecha_licenciamiento_final' => $entity->fecha_licenciamiento_final,
                    'numero_licencias' => $entity->numero_licencias,
                    'disponibilidad_sla_id' => $entity->disponibilidad_sla_id,
                    'disponibilidad_otro_detalle' => $entity->disponibilidad_otro_detalle,
                    'estado_activo_id' => $entity->estado_activo_id,
                    'fecha_inactivacion' => $entity->fecha_inactivacion,
                    'criticidad_interna_id' => $entity->criticidad_interna_id,
                    'criticidad_externa_id' => $entity->criticidad_externa_id,
                    'maneja_datos_personales' => $entity->maneja_datos_personales,
                    'tipo_dato_personal_id' => $entity->tipo_dato_personal_id,
                    'valor_confidencialidad_id' => $entity->valor_confidencialidad_id,
                    'valor_integridad_id' => $entity->valor_integridad_id,
                    'valor_disponibilidad_id' => $entity->valor_disponibilidad_id,
                    'activo_datos_basicos_id' => $entity->activo_datos_basicos_id,
                    'observaciones' => $entity->observaciones,
                    'created_at' => $entity->created_at,
                    'updated_at' => $entity->updated_at,
                ];
            }),
        ];

        if ($this->resource instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            $data['pagination'] = [
                'current_page' => $this->currentPage(),
                'from' => $this->firstItem(),
                'last_page' => $this->lastPage(),
                'path' => $this->path(),
                'per_page' => $this->perPage(),
                'to' => $this->lastItem(),
                'total' => $this->total(),
            ];
        }

        return $data;
    }
}
