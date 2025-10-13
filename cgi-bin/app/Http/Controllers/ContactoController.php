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
        'llamada' => 'nullable|boolean',
        'contestada' => 'nullable|boolean',
        'interesado' => 'nullable|boolean',
        'cita' => 'nullable|boolean',
        'clave_sir' => 'nullable|boolean',
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
    $contacto->llamada = $request->input('llamada') ? 1 : 0;
    $contacto->contestada = $request->input('contestada') ? 1 : 0;
    $contacto->interesado = $request->input('interesado') ? 1 : 0;
    $contacto->cita = $request->input('cita') ? 1 : 0;
    $contacto->clave_sir = $request->input('clave_sir') ? 1 : 0;
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


    

}

