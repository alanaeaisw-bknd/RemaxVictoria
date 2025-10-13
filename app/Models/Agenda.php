<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda_agente';

    protected $fillable = [
        'dia_semana_id',
        'momento_dia',
        'actividad_id',
    ];

    public $timestamps = false; // Desactiva las marcas de tiempo

    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }

    public function diaSemana()
    {
        return $this->belongsTo(DiaSemana::class);
    }
}
