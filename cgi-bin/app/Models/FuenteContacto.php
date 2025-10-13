<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuenteContacto extends Model
{
    protected $table = 'fuentes_contacto';
    protected $fillable = [
        'nombre_fuente',
    ];

    public static function getAllFuentesContacto()
    {
        return FuenteContacto::all();
    }

    public static function createFuenteContacto($data)
    {
        $fuenteContacto = new FuenteContacto();
        $fuenteContacto->fill($data);
        $fuenteContacto->save();

        return $fuenteContacto;
    }
}

