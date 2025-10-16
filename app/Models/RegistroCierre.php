<?php
namespace App\Models;
//registro cierre model
use Illuminate\Database\Eloquent\Model;

class RegistroCierre extends Model
{
    protected $dates = ['created_at', 'updated_at'];

    protected $table = 'registro_cierre';
    public $timestamps = false; // Indicamos a Laravel que no gestione los campos created_at y updated_at

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
        'porcentaje_comision',//Nuevos campos agregados para comisiones }
        'monto_comision_total',                                     // }
        'porcentaje_ingresador',                               // }   // }  
        'porcentaje_cerrador',                               // }    // }
        'porcentaje_oficina',                            // }     // }   // }
        'comision_ingresador',                                 // }
        'comision_cerrador',                                             // }
        'comision_oficina', // Nuevo campo agregado   // }
    ];

    // En tu modelo RegistroCierre
    public function userCerro()
    {
        return $this->belongsTo(User::class, 'cerro');
    }

    public function userIngreso()
    {
        return $this->belongsTo(User::class, 'ingreso');
    }
}
