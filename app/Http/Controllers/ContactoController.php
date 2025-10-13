<?php

namespace App\Http\Controllers;
use App\Models\Contacto;
use App\Models\FuenteContacto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactoController extends Controller
{
    
// ContactoController.php

public function mostrarContactosCirculoInfluencia()
{
    $user = Auth::guard('web')->user();
    if ($user->permisos->type === 'limited') {
        // Usuario agente
        $permiso = 'limited';
    } elseif ($user->permisos->type === 'full') {
        // Usuario staff
        $permiso = 'full';
    }


    // Obtener el user_id del usuario autenticado
    $user_id = auth()->user()->id;

    // Filtrar los contactos por el user_id
    $contactos = Contacto::where('user_id', $user_id)->get();

    // Pasa los contactos a la vista
    return view('circuloinf', ['contactos' => $contactos, 'permiso' => $permiso]);
}

public function store(Request $request)
{
    $rules = [
        'nombre' => 'required|string|max:255',
        'telefono' => 'nullable|string|max:20',
        'correo' => 'nullable|string|max:255',
        'fuente_contacto_id' => 'required|integer|exists:fuentes_contacto,id',
        'posible' => 'nullable|string|max:255',
        'clasificacion' => 'nullable|string|max:255',
        'llamada' => 'filled|boolean',
        'contestada' => 'filled|boolean',
        'interesado' => 'filled|boolean',
        'cita' => 'filled|boolean',
        'clave_sir' => 'nullable|string|max:255',
        'fovissste' => 'nullable|boolean',
        'infonavit' => 'nullable|boolean',
        'bancario' => 'nullable|boolean',
        'comentario' => 'nullable|string|max:255',
        'valor' => 'nullable|string|max:255',
        'semana' => 'nullable|integer',
        'mes' => 'nullable|string|max:255',
    ];

    $this->validate($request, $rules);

    // Obtenemos el usuario actual
    $user = Auth::guard('web')->user();


    // Creamos el contacto
    $contacto = new Contacto();
    $contacto->user_id = $user->id;
    $contacto->fuente_contacto_id = $request->input('fuente_contacto_id');
    $contacto->nombre = $request->input('nombre');
    $contacto->telefono = $request->input('telefono');
    $contacto->correo = $request->input('correo');
    $contacto->fuente_contacto_id = $request->input('fuente_contacto_id');
    $contacto->posible = $request->input('posible');
    $contacto->clasificacion = $request->input('clasificacion');

    // Convertimos los campos booleanos a enteros
    $contacto->llamada = $request->has('llamada');
    $contacto->contestada = $request->has('contestada');
    $contacto->interesado = $request->has('interesado');
    $contacto->cita = $request->has('cita');
    $contacto->clave_sir = $request->input('clave_sir');
    $contacto->fovissste = $request->input('fovissste') ? 1 : 0;
    $contacto->infonavit = $request->input('infonavit') ? 1 : 0;
    $contacto->bancario = $request->input('bancario') ? 1 : 0;
    $contacto->comentario = $request->input('comentario');
    $contacto->valor = $request->input('valor');
    $contacto->semana = $request->input('semana');
    $contacto->mes = $request->input('mes');


    $contacto->user_id = $contacto->user_id; // Asociar el nuevo contacto con el mismo usuario

    // Guardamos el contacto
    $contacto->save();

    // Agregamos el permiso de crear contactos si el usuario tiene el rol limited
    if ($user->permisos->type === 'limited') {
        $user->permisos->addPermission('create_contacts');
        $user->save();
    }
    
    // Redirigimos a la página de contactos
    return redirect()->route('contactos');
}

public function index()
{
    // Obtener todos los registros de la tabla fuente_contacto
    $fuentes_contacto = FuenteContacto::all();

    // Enviar los registros al formulario
    return view('contactos', compact('fuentes_contacto'));
}
    

public function update(Request $request, $id)
{
    // Validar y actualizar el contacto
    $contacto = Contacto::findOrFail($id);
    $contacto->update($request->all());

    // Redireccionar o enviar una respuesta JSON, según tus necesidades
    return redirect()->route('contactos');
}

public function destroy($id)
{
    // Encontrar el contacto
    $contacto = Contacto::findOrFail($id);

    // Eliminar el contacto
    $contacto->delete();

    // Redireccionar o enviar una respuesta JSON según tus necesidades
    return redirect()->route('contactos');
}


public function actualizarCheckbox(Request $request, $id)
{
    $campo = $request->input('campo');
    $valor = $request->input('valor');
    

    try {
    // Validar que el campo enviado es uno de los campos permitidos
    $camposPermitidos = ['llamada', 'contestada', 'interesado', 'cita'];
    if (!in_array($campo, $camposPermitidos)) {
        return response()->json(['error' => 'Campo no permitido'], 400);
    }

    // Obtener el contacto de la base de datos
    $contacto = Contacto::find($id);

    if (!$contacto) {
        return response()->json(['error' => 'Contacto no encontrado'], 404);
    }

    // Actualizar el valor del campo en el modelo y guardar en la base de datos
    $contacto->$campo = $valor;
    $contacto->save();

    return response()->json(['success' => true]);

    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
public function Estadistica(Request $request){
    $user = Auth::guard('web')->user();
    if ($user->permisos->type === 'limited') {
        // Usuario agente
        $permiso = 'limited';
    } elseif ($user->permisos->type === 'full') {
        // Usuario staff
        $permiso = 'full';
    }


    $user_id = $request->input('user_id');
    $contactData = Contacto::where('user_id', $user_id)
    ->select('mes', 'semana')
    ->distinct()
    ->get();

    $diccionario = [];

    foreach ($contactData as $item) {
        $mes = $item->mes;
        $semana = $item->semana;

        if (!isset($diccionario[$mes])) {
            $diccionario[$mes] = [];
        }

        $diccionario[$mes][] = $semana;
    }

    $fecha = $request->input('inputt');
    $parts = explode('/', $fecha);
    if (count($parts) === 2) {
        list($mess, $semanaa) = $parts;
        $llamadas = Contacto::where('user_id', $user_id)->where('mes', $mess)->where('semana', $semanaa)->where('llamada', 1)->get();
        $llamadas = $llamadas->count();
    
        $contestadas = Contacto::where('user_id', $user_id)->where('mes', $mess)->where('semana', $semanaa)->where('contestada', 1)->get();
        $contestadas = $contestadas->count();
    
        $interesados = Contacto::where('user_id', $user_id)->where('mes', $mess)->where('semana', $semanaa)->where('interesado', 1)->get();
        $interesados = $interesados->count();
    
        $citas = Contacto::where('user_id', $user_id)->where('mes', $mess)->where('semana', $semanaa)->where('cita', 1)->get();
        $citas = $citas->count();

        $tipos = Contacto::where('user_id', $user_id)->where('mes', $mess)->where('semana', $semanaa)->with('fuenteContacto')->get();
        $tipo = $tipos->pluck('fuenteContacto.nombre_fuente');

        $tabla = [];
        foreach ($tipos as $tip) {
            $nombreFuente = $tip->fuenteContacto->nombre_fuente;
            
            if (!isset($tabla[$nombreFuente])) {
                $tabla[$nombreFuente] = [0, 0]; // Inicializar el array con dos elementos
            }
            
            // Incrementar el contador del nombre fuente
            $tabla[$nombreFuente][0]++;
            
            // Si el valor de 'cita' es igual a 1, incrementar la suma
            if ($tip->cita == 1) {
                $tabla[$nombreFuente][1]++;
            }
        }

        $citas2 = Contacto::where('user_id', $user_id)->where('mes', $mess)->where('semana', $semanaa)->get();
        $citas2 = $citas2->pluck('cita');

        $contactosss= Contacto::where('user_id', $user_id)->where('mes', $mess)->where('semana', $semanaa)->get();
        $contactosss = $contactosss->pluck('cita');
        $contactosss = $contactosss->count();

        return view('stats', ['contactos' => $contactosss,'citas2'=>$citas2,'tabla' => $tabla,'tipo' => $tipo,'semanapuesta' => $semanaa, 'mespuesto' => $mess, 'citas' => $citas,'interesados' => $interesados,'contestadas' => $contestadas,'llamadas' => $llamadas, 'diccionario' => $diccionario, 'id'=> $user_id, 'permiso' => $permiso]);
    } else {
        $llamadas = '---';
        $contestadas = '---';
        $interesados = '---';
        $citas = '---';
        $semanaa = '---';
        $mess = '---'; 
        return view('stats', ['semanapuesta' => $semanaa, 'mespuesto' => $mess, 'citas' => $citas,'interesados' => $interesados,'contestadas' => $contestadas,'llamadas' => $llamadas, 'diccionario' => $diccionario, 'id'=> $user_id, 'permiso' => $permiso]);
    }
}

public function VerEstadisticasGlobales(){
    $user = Auth::guard('web')->user();
    if ($user->permisos->type === 'limited') {
        // Usuario agente
        $permiso = 'limited';
    } elseif ($user->permisos->type === 'full') {
        // Usuario staff
        $permiso = 'full';
    }

    $contactData = Contacto::select('mes', 'semana')
    ->distinct()
    ->get();

    $diccionario = [];

    foreach ($contactData as $item) {
        $mes = $item->mes;
        $semana = $item->semana;

        if (!isset($diccionario[$mes])) {
            $diccionario[$mes] = [];
        }

        $diccionario[$mes][] = $semana;
    }


    return view('statsglobales', ['diccionario' => $diccionario, 'permiso' => $permiso]);
}
public function EstadisticasGlobales (Request $request){
    $user = Auth::guard('web')->user();
    if ($user->permisos->type === 'limited') {
        // Usuario agente
        $permiso = 'limited';
    } elseif ($user->permisos->type === 'full') {
        // Usuario staff
        $permiso = 'full';
    }

    $contactData = Contacto::select('mes', 'semana')->distinct()->get();

    $diccionario = [];

    foreach ($contactData as $item) {
        $mes = $item->mes;
        $semana = $item->semana;

        if (!isset($diccionario[$mes])) {
            $diccionario[$mes] = [];
        }

        $diccionario[$mes][] = $semana;
    }

    $fecha = $request->input('inputt');
    $parts = explode('/', $fecha);
    if (count($parts) === 2) {
        list($mess, $semanaa) = $parts;
        $llamadas = Contacto::where('mes', $mess)->where('semana', $semanaa)->where('llamada', 1)->get();
        $llamadas = $llamadas->count();
    
        $contestadas = Contacto::where('mes', $mess)->where('semana', $semanaa)->where('contestada', 1)->get();
        $contestadas = $contestadas->count();
    
        $interesados = Contacto::where('mes', $mess)->where('semana', $semanaa)->where('interesado', 1)->get();
        $interesados = $interesados->count();
    
        $citas = Contacto::where('mes', $mess)->where('semana', $semanaa)->where('cita', 1)->get();
        $citas = $citas->count();

        $tipos = Contacto::where('mes', $mess)->where('semana', $semanaa)->with('fuenteContacto')->get();
        $tipo = $tipos->pluck('fuenteContacto.nombre_fuente');

        $tabla = [];
        foreach ($tipos as $tip) {
            $nombreFuente = $tip->fuenteContacto->nombre_fuente;
            
            if (!isset($tabla[$nombreFuente])) {
                $tabla[$nombreFuente] = [0, 0]; // Inicializar el array con dos elementos
            }
            
            // Incrementar el contador del nombre fuente
            $tabla[$nombreFuente][0]++;
            
            // Si el valor de 'cita' es igual a 1, incrementar la suma
            if ($tip->cita == 1) {
                $tabla[$nombreFuente][1]++;
            }
        }

        $citas2 = Contacto::where('mes', $mess)->where('semana', $semanaa)->get();
        $citas2 = $citas2->pluck('cita');

        $contactosss= Contacto::where('mes', $mess)->where('semana', $semanaa)->get();
        $contactosss = $contactosss->pluck('cita');
        $contactosss = $contactosss->count();

        return view('statsglobales', ['contactos' => $contactosss,'citas2'=>$citas2,'tabla' => $tabla,'tipo' => $tipo,'semanapuesta' => $semanaa, 'mespuesto' => $mess, 'citas' => $citas,'interesados' => $interesados,'contestadas' => $contestadas,'llamadas' => $llamadas, 'diccionario' => $diccionario, 'permiso' => $permiso]);
    }
}
}

