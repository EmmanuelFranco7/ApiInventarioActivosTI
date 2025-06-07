<?php

namespace App\Http\Resources\dependencias;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DependenciaResourceCollection extends ResourceCollection
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
                $transformedEntity = [

                    'id' => $entity->id,
            'nombre_dependencia' => $entity->nombre_dependencia,
            'otros_detalles' => $entity->otros_detalles,
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

                   
                ];

                return $transformedEntity;
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