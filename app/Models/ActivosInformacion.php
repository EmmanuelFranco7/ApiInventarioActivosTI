<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivosInformacion extends Model
{
    protected $table = TABLE_ACTIVOS_INFORMACION;

    protected $fillable = [
        'id',
        'nombre_activo',
        'identificador',
        'descripcion',
        'acronimo',
        'version_inicial',
        'version_actual',
        'proveedor_id',
        'url_acceso_interna',
        'url_acceso_externa',
        'tipo_adquisicion_id',
        'tiene_derechos_patrimoniales',
        'ref_doc_derechos_patrim',
        'categoria_activo_id',
        'categoria_otro_detalle',
        'fecha_licenciamiento_inicial',
        'fecha_licenciamiento_final',
        'numero_licencias',
        'disponibilidad_sla_id',
        'disponibilidad_otro_detalle',
        'estado_activo_id',
        'fecha_inactivacion',
        'criticidad_interna_id',
        'criticidad_externa_id',
        'maneja_datos_personales',
        'tipo_dato_personal_id',
        'valor_confidencialidad_id',
        'valor_integridad_id',
        'valor_disponibilidad_id',
        'activo_datos_basicos_id',
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

    // Relaciones belongsTo
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    public function tipoAdquisicion()
    {
        return $this->belongsTo(TipoAdquisicion::class, 'tipo_adquisicion_id');
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaActivo::class, 'categoria_activo_id');
    }

    public function estado()
    {
        return $this->belongsTo(EstadoActivo::class, 'estado_activo_id');
    }

    public function disponibilidadSla()
    {
        return $this->belongsTo(DisponibilidadSla::class, 'disponibilidad_sla_id');
    }

    public function criticidadInterna()
    {
        return $this->belongsTo(CriticidadInterna::class, 'criticidad_interna_id');
    }

    public function criticidadExterna()
    {
        return $this->belongsTo(CriticidadExterna::class, 'criticidad_externa_id');
    }

    public function tipoDatoPersonal()
    {
        return $this->belongsTo(TipoDatoPersonal::class, 'tipo_dato_personal_id');
    }

    public function valorConfidencialidad()
    {
        return $this->belongsTo(ValorConfidencialidad::class, 'valor_confidencialidad_id');
    }

    public function valorIntegridad()
    {
        return $this->belongsTo(ValorIntegridad::class, 'valor_integridad_id');
    }

    public function valorDisponibilidad()
    {
        return $this->belongsTo(ValorDisponibilidad::class, 'valor_disponibilidad_id');
    }

    // Relaciones hasMany
    public function archivos()
    {
        return $this->hasMany(ActivoArchivo::class, 'activo_informacion_id');
    }

    public function observaciones()
    {
        return $this->hasMany(ObservacionActivo::class, 'activo_informacion_id');
    }

    public function actualizaciones()
    {
        return $this->hasMany(ActivoActualizacion::class, 'activo_informacion_id');
    }
}
