<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivoFormatoDato extends Model
{
    protected $table = TABLE_ACTIVO_FORMATO_DATO;

    protected $fillable = [
        'id',
        'activo_informacion_id',
        'formato_dato_id',
        'direccion',
    ];

    protected $hidden = ['id'];

    public function activoInformacion()
    {
        return $this->belongsTo(ActivoInformacion::class, 'activo_informacion_id');
    }

    public function formatoDato()
    {
        return $this->belongsTo(FormatoDato::class, 'formato_dato_id');
    }
}
