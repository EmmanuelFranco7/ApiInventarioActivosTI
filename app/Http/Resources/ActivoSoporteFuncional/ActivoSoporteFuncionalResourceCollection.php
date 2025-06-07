<?php

namespace App\Http\Resources\ActivoSoporteFuncional;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ActivoSoporteFuncionalResourceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        $data = [
            'data' => $this->collection->transform(function ($item) {
                return [
                    'id' => $item->id,
                    'usuario_id' => $item->usuario_id,
                    'proveedor_id' => $item->proveedor_id,
                    'activo_informacion_id' => $item->activo_informacion_id,
                    'dependencia_id' => $item->dependencia_id,
                    'tiene_plataforma' => $item->tiene_plataforma,
                    'plataforma_detalle' => $item->plataforma_detalle,
                    'disponibilidad_sla_id' => $item->disponibilidad_sla_id,
                    'fecha_vencimiento' => $item->fecha_vencimiento,
                    'observaciones' => $item->observaciones,
                    'email' => $item->email,
                    'celular' => $item->celular,
                    'telefono' => $item->telefono,
                    'direccion' => $item->direccion,
                    'ciudad_id' => $item->ciudad_id,
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
