<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AgenteMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        // Verificar si el usuario tiene el rol de staff
        if ($user && $user->permisos->type === 'limited') {
            return $next($request);
        }

        // Redirigir si el usuario no tiene acceso
        return redirect('inicioadmin'); // Puedes redirigir a donde prefieras
    }
}
