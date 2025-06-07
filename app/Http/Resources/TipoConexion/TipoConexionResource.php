<?php

namespace App\Http\Resources\TipoConexion;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TipoConexionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
