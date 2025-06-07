<?php

namespace App\Http\Resources\ActivoSoporteTecnico;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ActivoSoporteTecnicoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'usuario_id' => $this->usuario_id,
            'activo_informacion_id' => $this->activo_informacion_id,
            'proveedor_id' => $this->proveedor_id,
            'dependencia_id' => $this->dependencia_id,
            'tiene_plataforma' => $this->tiene_plataforma,
            'disponibilidad_sla_id' => $this->disponibilidad_sla_id,
            'fecha_vencimiento' => $this->fecha_vencimiento,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'celular' => $this->celular,
            'direccion' => $this->direccion,
            'ciudad_id' => $this->ciudad_id,
            'observaciones' => $this->observaciones,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
