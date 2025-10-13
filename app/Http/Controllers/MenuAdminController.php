<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MenuAdminController extends Controller
{
   public function show()
{
    $user = Auth::guard('web')->user();
    if ($user->permisos->type === 'limited') {
        // Usuario agente
        $permiso = 'limited';
    } elseif ($user->permisos->type === 'full') {
        // Usuario staff
        $permiso = 'full';
    }
    
    // Verifica si el usuario está autenticado
    if (! auth()->check()) {
        return redirect('/login');
    }

    // Renderiza la vista de menú
    return view('menuadmin', ['permiso' => $permiso]);
}
}
