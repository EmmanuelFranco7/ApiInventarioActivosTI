<?php

namespace App\Http\Resources\dependencias; //ruta de la carpeta

use Illuminate\Http\Resources\Json\JsonResource;

class DependenciaResource extends JsonResource
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
            'nombre_dependencia' => $this->nombre_dependencia,
            'otros_detalles' => $this->otros_detalles,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,


        ];
    }
}
