<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivoIdioma extends Model
{
    protected $table = TABLE_ACTIVO_IDIOMA;

    protected $fillable = [
        'id',
        'activo_informacion_id',
        'idioma_id',
    ];

    protected $hidden = ['id'];

    public function activoInformacion()
    {
        return $this->belongsTo(ActivoInformacion::class, 'activo_informacion_id');
    }

    public function idioma()
    {
        return $this->belongsTo(Idioma::class, 'idioma_id');
    }
}
