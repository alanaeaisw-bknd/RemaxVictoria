<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nombre',
        'telefono',
        'correo',
        'fuente_contacto_id',
        'posible',
        'clasificacion',
        'llamada',
        'contestada',
        'interesado',
        'cita',
        'clave_sir',
        'fovissste',
        'infonavit',
        'bancario',
        'comentario',
        'valor',
        'semana',
        'mes',
        
        
    ];

    public function fuenteContacto()
    {
        return $this->belongsTo(FuenteContacto::class, 'fuente_contacto_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public static function getContactos()
    {
        return self::with(['fuenteContacto', 'user'])->get();
    }

    public static function getContactoById($id)
    {
        return self::with(['fuenteContacto', 'user'])->findOrFail($id);
    }

    public function createContacto($data)
    {
        return self::create($data);
    }

    public function updateContacto($id, $data)
{
    $contacto = self::findOrFail($id);
    $contacto->update($data);

    return $contacto;
}


    public function deleteContacto($id)
    {
        $contacto = self::findOrFail($id);
        $contacto->delete();

        return $contacto;
    }
}
