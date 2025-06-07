<?php

namespace App\Http\Resources\ActivoArchivo;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ActivoArchivoResourceCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        $data = [
            'data' => $this->collection->transform(function ($entity) {
                return [
                    'id' => $entity->id,
                    'activo_informacion_id' => $entity->activo_informacion_id,
                    'tipo' => $entity->tipo,
                    'directorio' => $entity->directorio,
                    'url' => $entity->url,
                    'descripcion' => $entity->descripcion,
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
