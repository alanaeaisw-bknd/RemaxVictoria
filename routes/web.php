<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\FuenteContactoController;
use App\Http\Controllers\InicioAdminController;
use App\Http\Controllers\MenuAdminController;
use App\Http\Controllers\RegistroCierreController;
use App\Http\Controllers\EstadisticasController; // Asegúrate que este archivo exista en app/Http/Controllers
use App\Http\Controllers\RegistroSCRUDController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar rutas web para tu aplicación.
|
*/

// RUTAS PRINCIPALES (Login, Logout, Menús)
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'store'])->name('login.store'); // Cambiado el nombre de la ruta POST
Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/menu');
    }
    return redirect('/login');
});

Route::get('/menu', [MenuController::class, 'renderMenu'])->name('menu')->middleware('auth', 'limited');
Route::get('/menuadmin', [MenuAdminController::class, 'show'])->name('menuadmin')->middleware('auth.redirect', 'auth', 'staff');

// RUTAS DE REGISTRO DE CIERRE Y ESTADÍSTICAS
Route::get('/registrocierre', [RegistroCierreController::class, 'index'])->name('registrocierre.index');
Route::post('/registrocierre', [RegistroCierreController::class, 'store'])->name('registrocierre.store');
Route::get('/estadisticas_cierre', [RegistroCierreController::class, 'showEstadisticas'])->name('estadisticas_cierre');

// CRUD para editar Registros
Route::get('/registros-cierre', [RegistroSCRUDController::class, 'index'])->name('registroscrud.index')->middleware('auth.redirect','auth','staff');
Route::get('/registros-cierre/{id}/edit', [RegistroSCRUDController::class, 'edit'])->name('registroscrud.edit')->middleware('auth.redirect','auth','staff');
Route::put('/registros-cierre/{id}', [RegistroSCRUDController::class, 'update'])->name('registroscrud.update')->middleware('auth.redirect','auth','staff');
Route::delete('/registros-cierre/{id}', [RegistroSCRUDController::class, 'destroy'])->name('registroscrud.destroy')->middleware('auth.redirect','auth','staff');

// Estadísticas (Tu ruta problemática)
Route::get('/estadisticas', [EstadisticasController::class, 'index'])->name('estadisticas.index')->middleware('auth.redirect','auth','staff');
Route::get('/filtrar-registros', [EstadisticasController::class, 'index'])->name('filtrarRegistros')->middleware('auth.redirect','auth','staff');
Route::get('/estadisticas/generate', [EstadisticasController::class, 'generateStats'])->name('estadisticas.generate'); // Esta ruta parece no usarse en tu controlador

// RUTAS DE ACTIVIDADES
Route::get('/actividades', [ActividadController::class, 'index'])->name('actividades')->middleware('auth');
Route::get('/actividadesAdmin/{id}', [ActividadController::class, 'indexAdmin'])->name('actividadesAdmin')->middleware('auth');
Route::post('/actividades', [ActividadController::class, 'store']); // ⚠️ ELIMINADO withoutMiddleware. Usa @csrf en tu form.
Route::get('/actividades/{id}', [ActividadController::class, 'show']);
Route::get('/actividades/{id}/edit', [ActividadController::class, 'edit']);
Route::put('/actividades/{id}', [ActividadController::class, 'update']); // ⚠️ ELIMINADO withoutMiddleware. Usa @csrf y @method('PUT').
Route::patch('/actividades/{id}', [ActividadController::class, 'update']);
Route::delete('/actividades/{id}', [ActividadController::class, 'destroy']); // ⚠️ ELIMINADO withoutMiddleware. Usa @csrf y @method('DELETE').

// RUTAS DE AGENDA
Route::get('/agendas', [AgendaController::class, 'index'])->name('agendas')->middleware('auth.redirect', 'auth','limited');
Route::get('/agenda/{ano}/{mes}/{semana}', [AgendaController::class, 'ver_agenda'])->name('agenda');
Route::get('/agenda/{ano}/{mes}/{semana}/{id}', [AgendaController::class, 'ver_agenda_admin'])->name('agendaa');
Route::post('/agendas', [AgendaController::class, 'store']); // ⚠️ ELIMINADO withoutMiddleware.
Route::post('/agendasCheck', [AgendaController::class, 'checkDuplicados'])->name('agendasCheck'); // ⚠️ ELIMINADO withoutMiddleware.
Route::put('/agendau', [AgendaController::class, 'update'])->name('agendau'); // ⚠️ ELIMINADO withoutMiddleware.
Route::put('/agendaue', [AgendaController::class, 'updateEstado'])->name('agendaue'); // ⚠️ ELIMINADO withoutMiddleware.
Route::get('/ver-agenda/{id}', [AgendaController::class, 'veragenda'])->name('ver-agenda')->middleware('auth.redirect', 'auth','staff');
Route::delete('/agendas/{id}', [AgendaController::class, 'destroy']); // ⚠️ ELIMINADO withoutMiddleware.

// RUTAS DE CONTACTOS
Route::get('/contactos', [ContactoController::class, 'mostrarContactosCirculoInfluencia'])->name('contactos')->middleware('auth.redirect', 'auth','limited');
Route::get('/fuentescontactos', [FuenteContactoController::class, 'index'])->name('fuentescontactos')->middleware('auth.redirect', 'auth');
Route::post('/contactos/store', [ContactoController::class, 'store'])->name('contactos.store'); // Corregido nombre de ruta
Route::get('/contacto/{id}', [ContactoController::class, 'show'])->name('contacto.show'); // Corregida sintaxis
Route::patch('/contacto/{id}', [ContactoController::class, 'update'])->name('contacto.update');
Route::patch('/contacto/nombre/{id}', [ContactoController::class, 'updateNombre'])->name('contacto.updateNombre');
Route::patch('/actualizar-checkbox/{id}', [ContactoController::class, 'actualizarCheckbox'])->name('contacto.actualizar.checkbox');
Route::delete('/contacto/{id}', [ContactoController::class, 'destroy'])->name('contacto.destroy'); // ⚠️ CORREGIDO de GET a DELETE

// RUTAS DE ADMINISTRACIÓN (STAFF)
Route::get('/inicioadmin', [InicioAdminController::class, 'index'])->name('inicioadmin')->middleware('auth.redirect', 'auth', 'staff');
Route::post('/inicioadmin/create', [InicioAdminController::class, 'create'])->name('inicioadmin/create');
Route::get('/inicioadmin/{id}/edit', [InicioAdminController::class, 'edit'])->name('agente.edit');
Route::patch('/inicioadmin/{id}', [InicioAdminController::class, 'update'])->name('agente.update');
Route::get('/inicioadmin/editar-usuario-staff/{id}', [InicioAdminController::class, 'editarUsuarioStaff'])->name('editarUsuarioStaff');
Route::patch('/inicioadmin/actualizar-usuario-staff/{id}', [InicioAdminController::class, 'actualizarUsuarioStaff'])->name('actualizarUsuarioStaff');
Route::get('/ver-contactos/{id}', [InicioAdminController::class, 'verContactos'])->name('ver-contactos')->middleware('auth.redirect', 'auth', 'staff');
Route::get('/obtener-contactos/{id}', [InicioAdminController::class, 'obtenerContactos']); // Corregida sintaxis
Route::post('/transferir-contactos', [InicioAdminController::class, 'transferirContactos'])->name('transferir-contactos');

// RUTAS DE ESTADÍSTICAS (Otras)
Route::post('/ver-stat', [ContactoController::class, 'Estadistica'])->name('ver-stat');
Route::post('/ver-stats-globales', [ContactoController::class, 'EstadisticasGlobales'])->name('statsglobales');
Route::get('/statsglobales', [ContactoController::class, 'VerEstadisticasGlobales'])->name('verstatsglobales');
Route::get('/stats/{id}', [InicioAdminController::class, 'verEstadisticas'])->name('stats')->middleware('auth');