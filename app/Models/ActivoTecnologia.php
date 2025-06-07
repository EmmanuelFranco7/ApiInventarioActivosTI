<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivoTecnologia extends Model
{
    protected $table = TABLE_ACTIVO_TECNOLOGIA;

    protected $fillable = [
        'id',
        'activo_informacion_id',
        'tecnologia_id',
        'ubicacion_ejecucion',
    ];

    protected $hidden = ['id'];

    public function activoInformacion()
    {
        return $this->belongsTo(ActivoInformacion::class, 'activo_informacion_id');
    }

    public function tecnologia()
    {
        return $this->belongsTo(Tecnologia::class, 'tecnologia_id');
    }
}
