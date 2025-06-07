<?php

namespace App\Http\Resources\ActivosOportunidadesMejora;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivosOportunidadesMejoraResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'activo_informacion_id' => $this->activo_informacion_id,
            'descripcion' => $this->descripcion,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
} 
