<?php

namespace App\Http\Resources\ActivosModulos;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ActivosModulosResourceCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        $data = [
            'data' => $this->collection->transform(function ($entity) {
                return [
                    'id' => $entity->id,
                    'activo_informacion_id' => $entity->activo_informacion_id,
                    'nombre_modulo' => $entity->nombre_modulo,
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
