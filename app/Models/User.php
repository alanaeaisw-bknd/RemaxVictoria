<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'nombre',
        'password',
        'permisos_id',
        'correo_institucional',
        'celular',
        'sir', 
        'nombre_archivo_foto',
        'activo',
    ];
    
    public $timestamps = false;

   
    public function permisos()
    {
        return $this->belongsTo(Permission::class, 'permisos_id');
    }
    public function setPasswordAttribute($password)
    {
         // Cifra la contraseña solo si se proporciona una nueva
         if (!empty($password)) {
             $this->attributes['password'] = bcrypt($password);
         }
    }
    public function contactos()
    {
        return $this->hasMany(Contacto::class, 'user_id', 'id');
    }
}
