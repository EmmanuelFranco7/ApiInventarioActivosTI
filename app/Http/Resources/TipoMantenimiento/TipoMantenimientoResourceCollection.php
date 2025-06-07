<?php

namespace App\Http\Resources\TipoMantenimiento;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TipoMantenimientoResourceCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        $data = [
            'data' => $this->collection->transform(function ($item) {
                return [
                    'id' => $item->id,
                    'nombre' => $item->nombre,
                    'created_at' => $item->created_at,
                    'updated_at' => $item->updated_at,
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
