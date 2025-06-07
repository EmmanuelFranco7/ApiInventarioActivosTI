<?php

namespace App\Http\Resources\ActivosUsuarios;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivosUsuariosResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'activo_informacion_id' => $this->activo_informacion_id,
            'usuario_id' => $this->usuario_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
