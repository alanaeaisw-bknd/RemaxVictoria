<?php
//holaaaaaaaaaaaaaa
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActividadController; // Importa el controlador
use App\Http\Controllers\AgendaController; // Importa el controlador
use App\Http\Controllers\AuthController; // Importa el controlador
use App\Http\Controllers\MenuController; // Importa el controlador
use App\Http\Controllers\LogoutController; // Importa el controlador
use App\Http\Controllers\ContactoController; // Importa el controlador
use App\Http\Controllers\FuenteContactoController; // Importa el controlador
use App\Http\Controllers\InicioAdminController; // Importa el controlador
use App\Http\Controllers\MenuAdminController; // Importa el controlador
use App\Http\Controllers\RegistroCierreController;
use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\RegistroSCRUDController;

Route::get('/registros-cierre', [RegistroSCRUDController::class, 'index'])->name('registroscrud.index')->middleware('auth.redirect','auth','staff');
Route::get('/registros-cierre/{id}/edit', [RegistroSCRUDController::class, 'edit'])->name('registroscrud.edit')->middleware('auth.redirect','auth','staff');
Route::put('/registros-cierre/{id}', [RegistroSCRUDController::class, 'update'])->name('registroscrud.update')->middleware('auth.redirect','auth','staff');
Route::delete('/registros-cierre/{id}', [RegistroSCRUDController::class, 'destroy'])->name('registroscrud.destroy')->middleware('auth.redirect','auth','staff');

// Ruta para la página de estadísticas
Route::get('/estadisticas', [EstadisticasController::class, 'index'])->name('estadisticas.index')->middleware('auth.redirect','auth','staff');
Route::get('/filtrar-registros', [EstadisticasController::class, 'index'])->name('filtrarRegistros')->middleware('auth.redirect','auth','staff');;

// Ruta para generar las estadísticas y mostrar la gráfica
Route::get('/estadisticas/generate', [EstadisticasController::class, 'generateStats'])->name('estadisticas.generate');

Route::get('/estadisticas_cierre', [RegistroCierreController::class, 'showEstadisticas'])->name('estadisticas_cierre');


Route::get('/registrocierre', [RegistroCierreController::class, 'index'])->name('registrocierre');
Route::get('/registrocierre', [RegistroCierreController::class, 'index'])->name('registrocierre.index');
Route::post('/registrocierre', [RegistroCierreController::class, 'store'])->name('registrocierre.store');

//RUTAS_ActividadController

Route::get('/actividades', [ActividadController::class, 'index'])->name('actividades')->middleware('auth');
Route::get('/actividadesAdmin/{id}', [ActividadController::class, 'indexAdmin'])->name('actividadesAdmin')->middleware('auth');

// Mostrar el formulario de creación (puedes omitir esta ruta si no es necesaria sin vistas)
//Route::get('/actividades/create', [ActividadController::class, 'create']);

// Ruta para la prueba de POST sin protección CSRF
Route::post('/actividades', [ActividadController::class, 'store'])->withoutMiddleware(['web']);

// Mostrar una actividad específica
Route::get('/actividades/{id}', [ActividadController::class, 'show']);

// Mostrar el formulario de edición (puedes omitir esta ruta si no es necesaria sin vistas)
Route::get('/actividades/{id}/edit', [ActividadController::class, 'edit']);

// Actualizar una actividad existente sin protección CSRF
Route::put('/actividades/{id}', [ActividadController::class, 'update'])->withoutMiddleware(['web']);

// Actualizar una actividad existente utilizando PATCH (puedes omitir esta ruta si no es necesaria sin vistas)
Route::patch('/actividades/{id}', [ActividadController::class, 'update']);

// Eliminar una actividad existente sin protección CSRF
Route::delete('/actividades/{id}', [ActividadController::class, 'destroy'])->withoutMiddleware(['web']);


//RUTAS AgendaController


// Ruta para listar todas las agendas
Route::get('/agendas', [AgendaController::class, 'index'])->name('agendas')->middleware('auth.redirect', 'auth','limited');

// Ruta para mostrar una agenda
Route::get('/agenda/{ano}/{mes}/{semana}', [AgendaController::class, 'ver_agenda'])->name('agenda');
Route::get('/agenda/{ano}/{mes}/{semana}/{id}', [AgendaController::class, 'ver_agenda_admin'])->name('agendaa');

// Ruta para mostrar el formulario de creación de agenda (no es necesario para una API sin vistas)

// Ruta para almacenar una nueva agenda sin protección CSRF
Route::post('/agendas', [AgendaController::class, 'store'])->withoutMiddleware(['web']);
Route::post('/agendasCheck', [AgendaController::class, 'checkDuplicados'])->withoutMiddleware(['web'])->name('agendasCheck');;

// Ruta para mostrar el formulario de edición de agenda (no es necesario para una API sin vistas)

// Ruta para actualizar una agenda existente sin protección CSRF
Route::put('/agendau', [AgendaController::class, 'update'])->withoutMiddleware(['web'])->name('agendau');
Route::put('/agendaue', [AgendaController::class, 'updateEstado'])->withoutMiddleware(['web'])->name('agendaue');


Route::get('/ver-agenda/{id}', [AgendaController::class, 'veragenda'])->name('ver-agenda')->middleware('auth.redirect', 'auth','staff');

// Ruta para eliminar una agenda sin protección CSRF
Route::delete('/agendas/{id}', [AgendaController::class, 'destroy'])->withoutMiddleware(['web']);

// Rutas de AuthController
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'store'])->name('login');

// Ruta principal
Route::get('/', function () {
    // Verificar si el usuario está autenticado
    if (auth()->check()) {
        // Si está autenticado, redirigir a la página de menú
        return redirect('/menu');
    } else {
        // Si no está autenticado, redirigir a la página de login
        return redirect('/login');
    }
});

// Ruta de MenuController
Route::get('/menu', [MenuController::class, 'renderMenu'])->name('menu')->middleware('auth', 'limited');

Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/contactos', [ContactoController::class, 'mostrarContactosCirculoInfluencia'])->name('contactos')->middleware('auth.redirect', 'auth','limited');

Route::get('/fuentescontactos', [FuenteContactoController::class, 'index'])->name('fuentescontactos')->middleware('auth.redirect', 'auth');

Route::get('/inicioadmin', [InicioAdminController::class, 'index'])->name('inicioadmin')->middleware('auth.redirect', 'auth', 'staff');

Route::post('/contactos/store', [ContactoController::class, 'store'])->name('/contactos/store');

Route::post('/ver-stat', [ContactoController::class, 'Estadistica'])->name('ver-stat');

Route::post('/ver-stats-globales', [ContactoController::class, 'EstadisticasGlobales'])->name('statsglobales');

Route::get('/statsglobales', [ContactoController::class, 'VerEstadisticasGlobales'])->name('verstatsglobales');


Route::patch('/contacto/{id}', [ContactoController::class, 'update'])->name('contacto.update');
Route::patch('/contacto/nombre/{id}', [ContactoController::class, 'updateNombre'])->name('contacto.updateNombre');


Route::get('/contacto/{id}', 'ContactoController@show')->name('contacto.show');

//Route::delete('/contacto/{id}', [ContactoController::class, 'destroy'])->name('contacto.destroy');

Route::get('/contacto/{id}/eliminar', [ContactoController::class, 'destroy'])->name('contacto.destroy');






// web.php
Route::post('/inicioadmin/create', [InicioAdminController::class, 'create'])->name('inicioadmin/create');



Route::get('/inicioadmin/{id}/edit', [InicioAdminController::class, 'edit'])->name('agente.edit');
Route::patch('/inicioadmin/{id}', [InicioAdminController::class, 'update'])->name('agente.update');



Route::get('/inicioadmin/editar-usuario-staff/{id}', [InicioAdminController::class, 'editarUsuarioStaff'])->name('editarUsuarioStaff');
Route::patch('/inicioadmin/actualizar-usuario-staff/{id}', [InicioAdminController::class, 'actualizarUsuarioStaff'])->name('actualizarUsuarioStaff');

Route::get('/ver-contactos/{id}', [InicioAdminController::class, 'verContactos'])->name('ver-contactos')->middleware('auth.redirect', 'auth', 'staff');

Route::get('/obtener-contactos/{id}', 'InicioAdminController@obtenerContactos');

Route::post('/transferir-contactos', [InicioAdminController::class, 'transferirContactos'])->name('transferir-contactos');

Route::get('/stats/{id}', [InicioAdminController::class, 'verEstadisticas'])->name('stats')->middleware('auth');

Route::get('/menuadmin', [MenuAdminController::class, 'show'])->name('menuadmin')->middleware('auth.redirect', 'auth', 'staff');

Route::patch('/actualizar-checkbox/{id}', [ContactoController::class, 'actualizarCheckbox'])->name('contacto.actualizar.checkbox');
