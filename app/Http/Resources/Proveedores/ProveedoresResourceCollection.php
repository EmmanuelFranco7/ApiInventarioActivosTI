<?php

namespace App\Http\Resources\Proveedores;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProveedoresResourceCollection extends ResourceCollection
{
    public function toArray($request): array
    {
        $data = [
            'data' => $this->collection->transform(function ($entity) {
                return [
                    'id' => $entity->id,
                    'nombre_proveedor' => $entity->nombre_proveedor,
                    'contacto_nombre' => $entity->contacto_nombre,
                    'contacto_cargo' => $entity->contacto_cargo,
                    'contacto_email' => $entity->contacto_email,
                    'direccion' => $entity->direccion,
                    'ciudad' => $entity->ciudad,
                    'telefono' => $entity->telefono,
                    'celular' => $entity->celular,
                    'email_soporte' => $entity->email_soporte,
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
