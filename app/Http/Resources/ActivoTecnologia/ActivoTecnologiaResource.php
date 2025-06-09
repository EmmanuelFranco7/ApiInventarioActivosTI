<?php

namespace App\Http\Resources\ActivoTecnologia;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivoTecnologiaResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'activo_informacion_id' => $this->activo_informacion_id,
            'tecnologia_id' => $this->tecnologia_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
