<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiaSemana extends Model
{
    protected $table = 'dias_semana';

    protected $fillable = [
        'nombre_dia',
    ];

    /**
     * Valida que el nombre del día sea una cadena de caracteres de entre 2 y 25 caracteres.
     *
     * @return void
     */
    public function rules()
    {
        return [
            'nombre_dia' => 'required|string|min:2|max:25',
        ];
    }
}
