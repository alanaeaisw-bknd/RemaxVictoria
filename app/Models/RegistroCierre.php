<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroCierre extends Model
{
    protected $table = 'registro_cierre';

    // Mantener false porque en tu controlador no usas timestamps automáticos
    public $timestamps = false;

    // Campos que se pueden llenar con create()
    protected $fillable = [
        'cerro',
        'ingreso',
        'monto_propiedad',
        'recurso',
        'fuente_contacto',
        'genero',
        'rango_edad',
        'estado_civil',
        'fecha',
        'porcentaje_comision',
        'monto_comision_total',
        'porcentaje_ingresador',
        'porcentaje_cerrador',
        'porcentaje_oficina',
        'porcentaje_developer',
        'comision_ingresador',
        'comision_cerrador',
        'comision_oficina',
        'comision_developer',
    ];

    // Relaciones
    public function usuarioCerro()
    {
        return $this->belongsTo(User::class, 'cerro', 'id');
    }

    public function usuarioIngreso()
    {
        return $this->belongsTo(User::class, 'ingreso', 'id');
    }

    public function fuenteContacto()
    {
        return $this->belongsTo(FuenteContacto::class, 'fuente_contacto', 'id');
    }
}
