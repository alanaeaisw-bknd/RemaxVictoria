<?php

namespace App\Providers;

// app/Providers/AppServiceProvider.php

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Compartir el usuario autenticado con todas las vistas
        View::composer('*', function ($view) {
            $view->with('usuario', auth()->user());
        });
    }
}