<?php

namespace App\Http\Resources\ActivosModulos;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivosModulosResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'activo_informacion_id' => $this->activo_informacion_id,
            'nombre_modulo' => $this->nombre_modulo,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
