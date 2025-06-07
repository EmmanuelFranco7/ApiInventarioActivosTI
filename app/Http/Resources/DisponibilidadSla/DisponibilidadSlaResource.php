<?php

namespace App\Http\Resources\DisponibilidadSla;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DisponibilidadSlaResource extends JsonResource
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
