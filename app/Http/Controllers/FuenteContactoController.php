<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FuenteContacto;

class FuenteContactoController extends Controller
{
    public function index()
    {
        $fuentesContacto = FuenteContacto::all();
    
        return response()->json($fuentesContacto);
    }
}
