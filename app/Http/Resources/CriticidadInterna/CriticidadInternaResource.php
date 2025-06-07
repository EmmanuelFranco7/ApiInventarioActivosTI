<?php

namespace App\Http\Resources\CriticidadInterna;

use Illuminate\Http\Resources\Json\JsonResource;

class CriticidadInternaResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
