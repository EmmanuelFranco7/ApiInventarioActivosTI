<?php

namespace App\Http\Resources\ActivoSoporteTecnico;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ActivoSoporteTecnicoResourceCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        $data = [
            'data' => $this->collection->transform(function ($entity) {
                return [
                    'id' => $entity->id,
                    'usuario_id' => $entity->usuario_id,
                    'activo_informacion_id' => $entity->activo_informacion_id,
                    'proveedor_id' => $entity->proveedor_id,
                    'dependencia_id' => $entity->dependencia_id,
                    'tiene_plataforma' => $entity->tiene_plataforma,
                    'disponibilidad_sla_id' => $entity->disponibilidad_sla_id,
                    'fecha_vencimiento' => $entity->fecha_vencimiento,
                    'email' => $entity->email,
                    'telefono' => $entity->telefono,
                    'celular' => $entity->celular,
                    'direccion' => $entity->direccion,
                    'ciudad_id' => $entity->ciudad_id,
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
