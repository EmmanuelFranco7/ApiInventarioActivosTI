<?php

namespace App\Http\Resources\Tecnologia;

use Illuminate\Http\Resources\Json\JsonResource;

class TecnologiaResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'nombre_tecnologia' => $this->nombre_tecnologia,
            'version' => $this->version,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
