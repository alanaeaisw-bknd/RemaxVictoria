<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class StaffMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        // Verificar si el usuario tiene el rol de staff
        if ($user && $user->permisos->type === 'full') {
            return $next($request);
        }

        // Redirigir si el usuario no tiene acceso
        return redirect('menu'); // Puedes redirigir a donde prefieras
    }
}
