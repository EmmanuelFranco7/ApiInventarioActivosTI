<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivoDatosBasicos extends Model
{
    protected $table = TABLE_ACTIVO_DATOS_BASICOS;

    protected $fillable = [
        'id',
        'ambito_trabajo_id',
        'fecha_puesta_produccion',
        'fecha_ultima_actualizacion',
        'activo_tipo_informacion_id',
        'activo_proposito_id',
        'permite_exportar_datos',
        'permite_importar_datos',
        'interactua_otros_sistemas',
        'tipo_arquitectura_id',
        'tiene_codigo_fuente',
        'enlace_codigo_fuente',
        'tiene_interfaz_grafica',
        'tiene_esquema_licenciamiento',
        'tiene_ayudas_linea',
        'tiene_esquema_roles_perfiles',
        'tiene_esquema_auditorias',
        'tiene_administracion_usuarios',
        'es_parametrizable',
        'tiene_certificado_sitio_seguro',
        'tiene_logos_institucionales',
        'controlado_por_firewall',
        'es_responsive',
        'tiene_webservice',
        'aplica_criterios_usabilidad_accesibilidad',
        'requiere_bd',
        'observaciones',
        'created_at',
        'updated_at',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(fn($model) => $model->created_at = now());
        static::updating(fn($model) => $model->updated_at = now());
    }

    protected $hidden = ['id'];
}
