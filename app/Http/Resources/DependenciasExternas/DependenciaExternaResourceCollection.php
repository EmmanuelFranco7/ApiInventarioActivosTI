<?php

namespace App\Http\Resources\DependenciasExternas;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DependenciaExternaResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'data' => $this->collection->transform(function ($entity) {
                return [
                    'id' => $entity->id,
                    'activo_informacion_id' => $entity->activo_informacion_id,
                    'nombre_dependencia' => $entity->nombre_dependencia,
                    'licenciamiento' => $entity->licenciamiento,
                    'descripcion_uso' => $entity->descripcion_uso,
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
