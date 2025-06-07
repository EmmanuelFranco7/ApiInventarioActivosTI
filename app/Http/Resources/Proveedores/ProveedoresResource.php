<?php

namespace App\Http\Resources\Proveedores;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProveedoresResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre_proveedor' => $this->nombre_proveedor,
            'contacto_nombre' => $this->contacto_nombre,
            'contacto_cargo' => $this->contacto_cargo,
            'contacto_email' => $this->contacto_email,
            'direccion' => $this->direccion,
            'ciudad' => $this->ciudad,
            'telefono' => $this->telefono,
            'celular' => $this->celular,
            'email_soporte' => $this->email_soporte,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
