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
        $permiso = auth()->user()->permisos_id;
        $user = Auth::guard('web')->user();
        if ($user->permisos->type === 'limited') {
            $permiso = 'limited';
        } elseif ($user->permisos->type === 'full') {
            $permiso = 'full';
        }

        if (! auth()->check()) {
            return redirect('/login');
        }

        $usuarios = User::pluck('nombre', 'id');

        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');

        if ($fechaInicio && $fechaFin) {
            $stats = $this->generateStatsByDateRange($fechaInicio, $fechaFin);
            $ingresoStats = $this->generateColumnStats2('ingreso', $fechaInicio, $fechaFin);
            $recursoStats = $this->generateColumnStats('recurso', $fechaInicio, $fechaFin);
            $fuenteContactoStats = $this->generateColumnStats3('fuente_contacto', $fechaInicio, $fechaFin);
            $generoStats = $this->generateColumnStats('genero', $fechaInicio, $fechaFin);
            $rangoEdadStats = $this->generateColumnStats('rango_edad', $fechaInicio, $fechaFin);
            $estadoCivilStats = $this->generateColumnStats('estado_civil', $fechaInicio, $fechaFin);
            $mesStats = $this->generateStatsByMonth($fechaInicio, $fechaFin);

            return view('estadisticas', compact(
                'usuarios', 'stats', 'permiso', 'ingresoStats', 'recursoStats',
                'fuenteContactoStats', 'generoStats', 'rangoEdadStats', 'estadoCivilStats', 'mesStats'
            ));
        }

        $stats = $this->generateStats();
        $ingresoStats = $this->generateColumnStats2('ingreso');
        $recursoStats = $this->generateColumnStats('recurso');
        $fuenteContactoStats = $this->generateColumnStats3('fuente_contacto');
        $generoStats = $this->generateColumnStats('genero');
        $rangoEdadStats = $this->generateColumnStats('rango_edad');
        $estadoCivilStats = $this->generateColumnStats('estado_civil');
        $mesStats = $this->generateStatsByMonth();

        return view('estadisticas', compact(
            'usuarios', 'stats', 'permiso', 'ingresoStats', 'recursoStats',
            'fuenteContactoStats', 'generoStats', 'rangoEdadStats', 'estadoCivilStats', 'mesStats'
        ));
    }

    // Estadísticas de cerrador
    private function generateStats()
    {
        return RegistroCierre::join('users', 'registro_cierre.cerro', '=', 'users.id')
            ->select(
                'cerro',
                'users.nombre',
                DB::raw('count(*) as cierres_count'),
                DB::raw('sum(registro_cierre.comision_cerrador) as total_monto')
            )
            ->groupBy('cerro', 'users.nombre')
            ->get();
    }

    private function generateStatsByDateRange($fechaInicio, $fechaFin)
    {
        return RegistroCierre::join('users', 'registro_cierre.cerro', '=', 'users.id')
            ->whereBetween('registro_cierre.fecha', [$fechaInicio, $fechaFin])
            ->select(
                'cerro',
                'users.nombre',
                DB::raw('count(*) as cierres_count'),
                DB::raw('sum(registro_cierre.comision_cerrador) as total_monto')
            )
            ->groupBy('cerro', 'users.nombre')
            ->get();
    }

    // Estadísticas de ingresador
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
            DB::raw('sum(registro_cierre.comision_ingresador) as monto_total')
        )->groupBy('users.nombre')->get();
    }

    // Estadísticas por columna general
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

    private function generateColumnStats3($column, $fechaInicio = null, $fechaFin = null)
    {
        $query = DB::table('registro_cierre')
            ->join('fuentes_contacto', 'registro_cierre.fuente_contacto', '=', 'fuentes_contacto.id');

        if ($fechaInicio && $fechaFin) {
            $query->whereBetween('registro_cierre.fecha', [$fechaInicio, $fechaFin]);
        }

        return $query->select(
            'fuentes_contacto.nombre_fuente as ' . $column,
            DB::raw('count(*) as count'),
            DB::raw('sum(monto_propiedad) as total_monto')
        )
        ->groupBy('fuentes_contacto.nombre_fuente')
        ->get();
    }

    private function generateStatsByMonth($fechaInicio = null, $fechaFin = null)
    {
        $query = RegistroCierre::select(
            DB::raw('MONTH(fecha) as month'),
            DB::raw('MONTHNAME(fecha) as month_name'),
            DB::raw('count(*) as cierres_count')
        )
        ->groupBy(DB::raw('MONTH(fecha), MONTHNAME(fecha)'));

        if ($fechaInicio && $fechaFin) {
            $query->whereBetween('fecha', [$fechaInicio, $fechaFin]);
        }

        $stats = $query->get();

        return $stats->map(function ($stat) {
            $stat->month_name = $this->translateMonthName($stat->month_name);
            return $stat;
        });
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
}
