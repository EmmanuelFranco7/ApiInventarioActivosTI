<?php

namespace App\Http\Resources\CategoriaActivo;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriaActivoResource extends JsonResource
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
