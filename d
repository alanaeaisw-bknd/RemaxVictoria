[1mdiff --git a/app/Http/Controllers/RegistroCierreController.php b/app/Http/Controllers/RegistroCierreController.php[m
[1mindex 92c4058b..3ecbbb9b 100644[m
[1m--- a/app/Http/Controllers/RegistroCierreController.php[m
[1m+++ b/app/Http/Controllers/RegistroCierreController.php[m
[36m@@ -57,23 +57,42 @@[m [mclass RegistroCierreController extends Controller[m
     $porcentajeComision = $request->porcentaje_comision;[m
     $montoComisionTotal = $montoPropiedad * ($porcentajeComision / 100);[m
 [m
[31m-    // Definir porcentajes según si el ingresador y cerrador son el mismo[m
[31m-    if ($request->ingreso == $request->cerro) {[m
[31m-        // Caso: ingresador y cerrador son el mismo[m
[31m-        $porcentajeIngresador = 70;[m
[32m+[m[32m    // Verificar si está marcado el modo developer[m
[32m+[m[32m    $modoDeveloper = $request->has('modo_developer');[m
[32m+[m
[32m+[m[32m    if ($modoDeveloper) {[m
[32m+[m[32m        // Caso: modo developer activado (50% oficina / 50% developer)[m
[32m+[m[32m        $porcentajeIngresador = 0;[m
         $porcentajeCerrador = 0;[m
[31m-        $porcentajeOficina = 30;[m
[32m+[m[32m        $porcentajeOficina = 50;[m
[32m+[m[32m        $porcentajeDeveloper = 50;[m
[32m+[m
[32m+[m[32m        // Cálculo de montos individuales[m
[32m+[m[32m        $comisionIngresador = 0;[m
[32m+[m[32m        $comisionCerrador = 0;[m
[32m+[m[32m        $comisionOficina = $montoComisionTotal * ($porcentajeOficina / 100);[m
[32m+[m[32m        $comisionDeveloper = $montoComisionTotal * ($porcentajeDeveloper / 100);[m
     } else {[m
[31m-        // Caso: ingresador y cerrador diferentes[m
[31m-        $porcentajeIngresador = 35;[m
[31m-        $porcentajeCerrador = 35;[m
[31m-        $porcentajeOficina = 30;[m
[31m-    }[m
[32m+[m[32m        // Definir porcentajes según si el ingresador y cerrador son el mismo[m
[32m+[m[32m        if ($request->ingreso == $request->cerro) {[m
[32m+[m[32m            // Caso: ingresador y cerrador son el mismo[m
[32m+[m[32m            $porcentajeIngresador = 70;[m
[32m+[m[32m            $porcentajeCerrador = 0;[m
[32m+[m[32m            $porcentajeOficina = 30;[m
[32m+[m[32m        } else {[m
[32m+[m[32m            // Caso: ingresador y cerrador diferentes[m
[32m+[m[32m            $porcentajeIngresador = 35;[m
[32m+[m[32m            $porcentajeCerrador = 35;[m
[32m+[m[32m            $porcentajeOficina = 30;[m
[32m+[m[32m        }[m
 [m
[31m-    // Cálculo de montos individuales[m
[31m-    $comisionIngresador = $montoComisionTotal * ($porcentajeIngresador / 100);[m
[31m-    $comisionCerrador = $montoComisionTotal * ($porcentajeCerrador / 100);[m
[31m-    $comisionOficina = $montoComisionTotal * ($porcentajeOficina / 100);[m
[32m+[m[32m        // Cálculo de montos individuales[m
[32m+[m[32m        $comisionIngresador = $montoComisionTotal * ($porcentajeIngresador / 100);[m
[32m+[m[32m        $comisionCerrador = $montoComisionTotal * ($porcentajeCerrador / 100);[m
[32m+[m[32m        $comisionOficina = $montoComisionTotal * ($porcentajeOficina / 100);[m
[32m+[m[32m        $comisionDeveloper = null;[m
[32m+[m[32m        $porcentajeDeveloper = null;[m
[32m+[m[32m    }[m
 [m
     // Crear registro en la base de datos[m
     $registro = RegistroCierre::create([[m
[36m@@ -91,13 +110,15 @@[m [mclass RegistroCierreController extends Controller[m
         'porcentaje_ingresador' => $porcentajeIngresador,[m
         'porcentaje_cerrador' => $porcentajeCerrador,[m
         'porcentaje_oficina' => $porcentajeOficina,[m
[32m+[m[32m        'porcentaje_developer' => $porcentajeDeveloper,[m
         'comision_ingresador' => $comisionIngresador,[m
         'comision_cerrador' => $comisionCerrador,[m
         'comision_oficina' => $comisionOficina,[m
[32m+[m[32m        'comision_developer' => $comisionDeveloper,[m
     ]);[m
 [m
     // Redirige a la página de éxito con un mensaje[m
     return redirect()->back()->with('success', 'Registro de cierre creado correctamente con comisiones calculadas.');[m
 }[m
 [m
[31m-}[m
[32m+[m[32m}[m
\ No newline at end of file[m
[1mdiff --git a/app/Models/RegistroCierre.php b/app/Models/RegistroCierre.php[m
[1mindex 9f40e153..3525517a 100644[m
[1m--- a/app/Models/RegistroCierre.php[m
[1m+++ b/app/Models/RegistroCierre.php[m
[36m@@ -1,30 +1,16 @@[m
 <?php[m
 namespace App\Models;[m
[31m-//registro cierre model[m
[32m+[m
 use Illuminate\Database\Eloquent\Model;[m
 [m
 class RegistroCierre extends Model[m
 {[m
[31m-    protected $dates = ['created_at', 'updated_at'];[m
[31m-[m
     protected $table = 'registro_cierre';[m
[31m-    public $timestamps = false; // Indicamos a Laravel que no gestione los campos created_at y updated_at[m
 [m
[31m-    public function usuarioCerro()[m
[31m-    {[m
[31m-        return $this->belongsTo(User::class, 'cerro', 'id');[m
[31m-    }[m
[31m-[m
[31m-    public function usuarioIngreso()[m
[31m-    {[m
[31m-        return $this->belongsTo(User::class, 'ingreso', 'id');[m
[31m-    }[m
[31m-[m
[31m-    public function fuenteContacto()[m
[31m-    {[m
[31m-        return $this->belongsTo(FuenteContacto::class, 'fuente_contacto', 'id');[m
[31m-    }[m
[32m+[m[32m    // Mantener false porque en tu controlador no usas timestamps automáticos[m
[32m+[m[32m    public $timestamps = false;[m
 [m
[32m+[m[32m    // Campos que se pueden llenar con create()[m
     protected $fillable = [[m
         'cerro',[m
         'ingreso',[m
[36m@@ -35,24 +21,31 @@[m [mclass RegistroCierre extends Model[m
         'rango_edad',[m
         'estado_civil',[m
         'fecha',[m
[31m-        'porcentaje_comision',//Nuevos campos agregados para comisiones }[m
[31m-        'monto_comision_total',                                     // }[m
[31m-        'porcentaje_ingresador',                               // }   // }  [m
[31m-        'porcentaje_cerrador',                               // }    // }[m
[31m-        'porcentaje_oficina',                            // }     // }   // }[m
[31m-        'comision_ingresador',                                 // }[m
[31m-        'comision_cerrador',                                             // }[m
[31m-        'comision_oficina', // Nuevo campo agregado   // }[m
[32m+[m[32m        'porcentaje_comision',[m
[32m+[m[32m        'monto_comision_total',[m
[32m+[m[32m        'porcentaje_ingresador',[m
[32m+[m[32m        'porcentaje_cerrador',[m
[32m+[m[32m        'porcentaje_oficina',[m
[32m+[m[32m        'porcentaje_developer',[m
[32m+[m[32m        'comision_ingresador',[m
[32m+[m[32m        'comision_cerrador',[m
[32m+[m[32m        'comision_oficina',[m
[32m+[m[32m        'comision_developer',[m
     ];[m
 [m
[31m-    // En tu modelo RegistroCierre[m
[31m-    public function userCerro()[m
[32m+[m[32m    // Relaciones[m
[32m+[m[32m    public function usuarioCerro()[m
[32m+[m[32m    {[m
[32m+[m[32m        return $this->belongsTo(User::class, 'cerro', 'id');[m
[32m+[m[32m    }[m
[32m+[m
[32m+[m[32m    public function usuarioIngreso()[m
     {[m
[31m-        return $this->belongsTo(User::class, 'cerro');[m
[32m+[m[32m        return $this->belongsTo(User::class, 'ingreso', 'id');[m
     }[m
 [m
[31m-    public function userIngreso()[m
[32m+[m[32m    public function fuenteContacto()[m
     {[m
[31m-        return $this->belongsTo(User::class, 'ingreso');[m
[32m+[m[32m        return $this->belongsTo(FuenteContacto::class, 'fuente_contacto', 'id');[m
     }[m
[31m-}[m
[32m+[m[32m}[m
\ No newline at end of file[m
