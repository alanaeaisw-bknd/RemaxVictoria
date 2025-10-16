<?php
//registro cierrecontroller
namespace App\Http\Controllers;

use App\Models\RegistroCierre;
use App\Models\User;
use App\Models\FuenteContacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistroCierreController extends Controller
{
    public function index()
    {
        // Obtén usuarios con permisos igual a 2 y activos igual a 1
        $usuarios = User::where('permisos_id', 2)
                        ->where('activo', 1)
                        ->pluck('nombre', 'id'); // Obtén solo los nombres de usuario como un array asociativo     
        $fuentes_contacto = FuenteContacto::all();
        return view('registrocierre', compact('usuarios', 'fuentes_contacto'));
    }

    public function showEstadisticas()
    {
        $usuarios = User::where('permisos_id', 2)
                        ->where('activo', 1)
                        ->pluck('nombre', 'id');

        $registros = RegistroCierre::select('cerro', DB::raw('count(*) as cierres_totales'), DB::raw('sum(monto_propiedad) as suma_monto_propiedades'))
                                  ->groupBy('cerro')
                                  ->get();

        dd($usuarios, $registros); // Verifica si los datos se están recuperando correctamente

        return view('estadisticas_cierre', compact('usuarios', 'registros'));
    }

    // Método para almacenar un nuevo registro en la base de datos
    public function store(Request $request)
{
    // Validaciones básicas
    $request->validate([
        'cerro' => 'required|numeric',
        'ingreso' => 'required|numeric',
        'monto_propiedad' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
        'recurso' => 'required|string',
        'fuente_contacto' => 'required|integer|not_in:0',
        'genero' => 'required|string|not_in:0',
        'rango_edad' => 'required|string|not_in:0',
        'estado_civil' => 'required|string|not_in:0',
        'fecha' => 'required|date',
        'porcentaje_comision' => 'required|numeric|min:0',
    ]);

    // Cálculo del monto total de comisión
    $montoPropiedad = $request->monto_propiedad;
    $porcentajeComision = $request->porcentaje_comision;
    $montoComisionTotal = $montoPropiedad * ($porcentajeComision / 100);

    // Definir porcentajes según si el ingresador y cerrador son el mismo
    if ($request->ingreso == $request->cerro) {
        // Caso: ingresador y cerrador son el mismo
        $porcentajeIngresador = 50;
        $porcentajeCerrador = 0;
        $porcentajeOficina = 50;
    } else {
        // Caso: ingresador y cerrador diferentes
        $porcentajeIngresador = 35;
        $porcentajeCerrador = 35;
        $porcentajeOficina = 30;
    }

    // Cálculo de montos individuales
    $comisionIngresador = $montoComisionTotal * ($porcentajeIngresador / 100);
    $comisionCerrador = $montoComisionTotal * ($porcentajeCerrador / 100);
    $comisionOficina = $montoComisionTotal * ($porcentajeOficina / 100);

    // Crear registro en la base de datos
    $registro = RegistroCierre::create([
        'cerro' => $request->cerro,
        'ingreso' => $request->ingreso,
        'monto_propiedad' => $montoPropiedad,
        'recurso' => $request->recurso,
        'fuente_contacto' => $request->fuente_contacto,
        'genero' => $request->genero,
        'rango_edad' => $request->rango_edad,
        'estado_civil' => $request->estado_civil,
        'fecha' => $request->fecha,
        'porcentaje_comision' => $porcentajeComision,
        'monto_comision_total' => $montoComisionTotal,
        'porcentaje_ingresador' => $porcentajeIngresador,
        'porcentaje_cerrador' => $porcentajeCerrador,
        'porcentaje_oficina' => $porcentajeOficina,
        'comision_ingresador' => $comisionIngresador,
        'comision_cerrador' => $comisionCerrador,
        'comision_oficina' => $comisionOficina,
    ]);

    // Redirige a la página de éxito con un mensaje
    return redirect()->back()->with('success', 'Registro de cierre creado correctamente con comisiones calculadas.');
}

}
