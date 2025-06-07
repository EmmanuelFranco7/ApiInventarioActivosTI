<?php

namespace App\Http\Resources\ActivoSoporteFuncional;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivoSoporteFuncionalResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'usuario_id' => $this->usuario_id,
            'proveedor_id' => $this->proveedor_id,
            'activo_informacion_id' => $this->activo_informacion_id,
            'dependencia_id' => $this->dependencia_id,
            'tiene_plataforma' => $this->tiene_plataforma,
            'plataforma_detalle' => $this->plataforma_detalle,
            'disponibilidad_sla_id' => $this->disponibilidad_sla_id,
            'fecha_vencimiento' => $this->fecha_vencimiento,
            'observaciones' => $this->observaciones,
            'email' => $this->email,
            'celular' => $this->celular,
            'telefono' => $this->telefono,
            'direccion' => $this->direccion,
            'ciudad_id' => $this->ciudad_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
