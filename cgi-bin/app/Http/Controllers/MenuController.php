<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class MenuController extends Controller
{
    // Renderiza la vista menu
    // En el controlador de menú
public function renderMenu()
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
    return view('menu', ['permiso' => $permiso]);
}

}