<?php

namespace App\Http\Resources\DependenciasExternas;

use Illuminate\Http\Resources\Json\JsonResource;

class DependenciaExternaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'activo_informacion_id' => $this->activo_informacion_id,
            'nombre_dependencia' => $this->nombre_dependencia,
            'licenciamiento' => $this->licenciamiento,
            'descripcion_uso' => $this->descripcion_uso,
            'observaciones' => $this->observaciones,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
