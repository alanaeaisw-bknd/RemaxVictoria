<?php

namespace App\Http\Controllers;

use App\Models\RegistroCierre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EstadisticasController extends Controller
{
    public function index(Request $request)
{
    // Lógica para obtener el permiso del usuario actual
    $permiso = auth()->user()->permisos_id;

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

    $usuarios = User::pluck('nombre', 'id');

    // Verifica si se enviaron fechas en la solicitud
    $fechaInicio = $request->input('fechaInicio');
    $fechaFin = $request->input('fechaFin');

    // Si se proporcionan fechas, realiza la consulta con el filtro de fechas
    if ($fechaInicio && $fechaFin) {
        $stats = $this->generateStatsByDateRange($fechaInicio, $fechaFin);
        $ingresoStats = $this->generateColumnStats2('ingreso', $fechaInicio, $fechaFin);
        $recursoStats = $this->generateColumnStats('recurso', $fechaInicio, $fechaFin);
        $fuenteContactoStats = $this->generateColumnStats3('fuente_contacto', $fechaInicio, $fechaFin);
        $generoStats = $this->generateColumnStats('genero', $fechaInicio, $fechaFin);
        $rangoEdadStats = $this->generateColumnStats('rango_edad', $fechaInicio, $fechaFin);
        $estadoCivilStats = $this->generateColumnStats('estado_civil', $fechaInicio, $fechaFin);

        // Dentro de la función index
        $mesStats = $this->generateStatsByMonth($fechaInicio, $fechaFin);

        // ... (resto del código existente)

        return view('estadisticas', compact('usuarios', 'stats', 'permiso', 'ingresoStats', 'recursoStats', 'fuenteContactoStats', 'generoStats', 'rangoEdadStats', 'estadoCivilStats', 'mesStats'));
    }

    // Si no se proporcionan fechas, realiza la consulta sin filtro
    $stats = $this->generateStats();
    $ingresoStats = $this->generateColumnStats2('ingreso');
    $recursoStats = $this->generateColumnStats('recurso');
    $fuenteContactoStats = $this->generateColumnStats3('fuente_contacto');
    $generoStats = $this->generateColumnStats('genero');
    $rangoEdadStats = $this->generateColumnStats('rango_edad');
    $estadoCivilStats = $this->generateColumnStats('estado_civil');

    // Dentro de la función index
    $mesStats = $this->generateStatsByMonth();

    // ... (resto del código existente)

    // Cambiar 'mesData' a 'mesStats' en el compact
    return view('estadisticas', compact('usuarios', 'stats', 'permiso', 'ingresoStats', 'recursoStats', 'fuenteContactoStats', 'generoStats', 'rangoEdadStats', 'estadoCivilStats', 'mesStats'));
}

    // Otras funciones del controlador...
    
    // Función para generar estadísticas generales
    private function generateStats()
    {
        // Obtén el conteo de cierres y la suma de montos por usuario
        $stats = RegistroCierre::join('users', 'registro_cierre.cerro', '=', 'users.id')
            ->select('cerro', 'users.nombre', DB::raw('count(*) as cierres_count'), DB::raw('sum(monto_propiedad) as total_monto'))
            ->groupBy('cerro', 'users.nombre')
            ->get();

        return $stats;
    }

    // Función para generar estadísticas de una columna específica con filtro de fechas
    private function generateColumnStats($column, $fechaInicio = null, $fechaFin = null)
    {
        $query = DB::table('registro_cierre');

        if ($fechaInicio && $fechaFin) {
            $query->whereBetween('fecha', [$fechaInicio, $fechaFin]);
        }

        return $query->select($column, DB::raw('count(*) as count'))
            ->groupBy($column)
            ->get();
    }

    private function generateColumnStats2($column, $fechaInicio = null, $fechaFin = null)
{
    $query = DB::table('registro_cierre')
        ->join('users', 'registro_cierre.ingreso', '=', 'users.id');

    if ($fechaInicio && $fechaFin) {
        $query->whereBetween('registro_cierre.fecha', [$fechaInicio, $fechaFin]);
    }

    return $query->select(
        'users.nombre as ' . $column,
        DB::raw('count(*) as count'),
        DB::raw('sum(registro_cierre.monto_propiedad) as monto_total') // Agregar la sumatoria del monto_propiedad
    )->groupBy('users.nombre')->get();
}

    private function generateColumnStats3($column, $fechaInicio = null, $fechaFin = null)
    {
        $query = DB::table('registro_cierre')
            ->join('fuentes_contacto', 'registro_cierre.fuente_contacto', '=', 'fuentes_contacto.id');

        if ($fechaInicio && $fechaFin) {
            $query->whereBetween('registro_cierre.fecha', [$fechaInicio, $fechaFin]);
        }

        return $query->select('fuentes_contacto.nombre_fuente as '.$column, DB::raw('count(*) as count'), DB::raw('sum(monto_propiedad) as total_monto'))
            ->groupBy('fuentes_contacto.nombre_fuente')
            ->get();
    }

    // Función para generar estadísticas por fecha
    private function generateStatsByDateRange($fechaInicio, $fechaFin)
    {
        $stats = RegistroCierre::join('users', 'registro_cierre.cerro', '=', 'users.id')
            ->whereBetween('registro_cierre.fecha', [$fechaInicio, $fechaFin])
            ->select('cerro', 'users.nombre', DB::raw('count(*) as cierres_count'), DB::raw('sum(monto_propiedad) as total_monto'))
            ->groupBy('cerro', 'users.nombre')
            ->get();

        return $stats;
    }
    private function generateStatsByMonth($fechaInicio = null, $fechaFin = null)
{
    $query = RegistroCierre::select(
        DB::raw('MONTH(fecha) as month'),
        DB::raw('MONTHNAME(fecha) as month_name'),
        DB::raw('count(*) as cierres_count')
    )
    ->groupBy(DB::raw('MONTH(fecha), MONTHNAME(fecha)'));

    // Agregar filtro de fecha si se proporcionan fechas
    if ($fechaInicio && $fechaFin) {
        $query->whereBetween('fecha', [$fechaInicio, $fechaFin]);
    }

    $stats = $query->get();

    // Convertir el nombre del mes a español
    $stats = $stats->map(function ($stat) {
        $stat->month_name = $this->translateMonthName($stat->month_name);
        return $stat;
    });

    return $stats;
}


private function translateMonthName($englishMonthName)
{
    $translations = [
        'January' => 'Enero',
        'February' => 'Febrero',
        'March' => 'Marzo',
        'April' => 'Abril',
        'May' => 'Mayo',
        'June' => 'Junio',
        'July' => 'Julio',
        'August' => 'Agosto',
        'September' => 'Septiembre',
        'October' => 'Octubre',
        'November' => 'Noviembre',
        'December' => 'Diciembre',
    ];

    return $translations[$englishMonthName] ?? $englishMonthName;
}
    
    // Resto del controlador...
}