<?php

namespace App\Http\Resources\ActivoArchivo;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivoArchivoResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'activo_informacion_id' => $this->activo_informacion_id,
            'tipo' => $this->tipo,
            'directorio' => $this->directorio,
            'url' => $this->url,
            'descripcion' => $this->descripcion,
            'observaciones' => $this->observaciones,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
