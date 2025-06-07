<?php

namespace App\Http\Resources\ActivosInformacion;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivosInformacionResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'nombre_activo' => $this->nombre_activo,
            'descripcion' => $this->descripcion,
            'tipo_activo' => $this->tipo_activo,
            'estado' => $this->estado,
            'fecha_adquisicion' => $this->fecha_adquisicion,
            'valor' => $this->valor,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
