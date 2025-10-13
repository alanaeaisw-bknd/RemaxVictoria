@php
use App\Models\FuenteContacto;
$fuentes_contacto = FuenteContacto::all();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Circulo Influencia</title>
    <link rel="stylesheet" href="{{ asset('css/style4.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <header>
        @include('nav')
    </header>
    @if ($permiso == "limited")
    <button type="button" class="btn btn-success" id="btn_agregar" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <img src="{{ asset('images\agregar.png') }}" alt="" id="suma">
    </button>
    @endif
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content" id="modal">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Registro</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('contactos/store') }}" method="POST">
                @csrf
                        <div class="mb-3">
                            <label for="Nombre" class="form-label">Nombre Completo:</label>
                            <input type="text" class="form-control" name="nombre" placeholder="" required>
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Telefono:</label>
                            <input type="text" name="telefono" class="form-control" placeholder="" nullable>
                        </div>

                        <div class="mb-3">
                            <label for="Correo" class="form-label">Correo:</label>
                            <input type="email" name="correo" class="form-control" placeholder="" nullable>
                        </div>
                        <div class="mb-3">
                            <label for="fuente_contacto_id" class="form-label">Fuente de Contacto:</label>
                            <select name="fuente_contacto_id" class="form-select">
                                @foreach ($fuentes_contacto as $fuente_contacto)
                                    <option value="{{ $fuente_contacto->id }}">{{ $fuente_contacto->nombre_fuente }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="posible" class="form-label">Posible:</label>
                            <select id="posible" name="posible" class="form-select" nullable>
                                <option text="opcion3">---</option>
                                <option text="Comprador">Comprador</option>
                                <option text="Vendedor">Vendedor</option>
                                <option text="Arrendador">Arrendador</option>
                                <option text="Arrendatario">Arrendatario</option>
                                <option text="Referido">Referido</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="clasificacion" class="form-label">Clasificacion:</label>  
                            <select id="clasificacion" name="clasificacion" class="form-select" nullable>
                                <option value="opcion1">---</option>
                                <option text="A">A</option>
                                <option text="B">B</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="llamada" class="form-label">LLamada:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="llamada" value="1">
                                <label class="form-check-label">Verdadero</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="llamada" value="0">
                                <label class="form-check-label">Falso</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="contestada" class="form-label">Contestada:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="contestada" value="1">
                                <label class="form-check-label">Verdadero</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="contestada" value="0">
                                <label class="form-check-label">Falso</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="interesado" class="form-label">Interesado:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="interesado" value="1">
                                <label class="form-check-label">Verdadero</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="interesado" value="0">
                                <label class="form-check-label">Falso</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="cita" class="form-label">Cita:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cita" value="1">
                                <label class="form-check-label">Verdadero</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="cita" value="0">
                                <label class="form-check-label">Falso</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="llamada" class="form-label">LLamada:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="llamada" value="1">
                                <label class="form-check-label">Verdadero</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="llamada" value="0">
                                <label class="form-check-label">Falso</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="CLAVE_SIR" class="form-label">CLAVE_SIR:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="clave_sir" value="1">
                                <label class="form-check-label">Verdadero</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="clave_sir" value="0">
                                <label class="form-check-label">Falso</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="FOVISSSTE" class="form-label">FOVISSSTE:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="fovissste" value="1">
                                <label class="form-check-label">Verdadero</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="fovissste" value="0">
                                <label class="form-check-label">Falso</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="infonavit" class="form-label">Infonavit:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="infonavit" value="1">
                                <label class="form-check-label">Verdadero</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="infonavit" value="0">
                                <label class="form-check-label">Falso</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="bancario" class="form-label">Bancario:</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="bancario" value="1">
                                <label class="form-check-label">Verdadero</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="bancario" value="0">
                                <label class="form-check-label">Falso</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="comentario" class="form-label">Comentario:</label>
                            <textarea class="form-control" name="comentario" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="valor" class="form-label">Valor:</label>
                            <input type="text" class="form-control" name="valor" placeholder="" required>
                        </div>

                        <div class="mb-3">
                            <label for="semana" class="form-label">Semana:</label>
                            <select class="form-select" name="semana">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="mes" class="form-label">Mes:</label>
                            <select class="form-select" name="mes">
                                <option value="Enero">Enero</option>
                                <option value="Febrero">Febrero</option>
                                <option value="Marzo">Marzo</option>
                                <option value="Abril">Abril</option>
                                <option value="Mayo">Mayo</option>
                                <option value="Junio">Junio</option>
                                <option value="Julio">Julio</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Septiembre">Septiembre</option>
                                <option value="Octubre">Octubre</option>
                                <option value="Noviembre">Noviembre</option>
                                <option value="Diciembre">Diciembre</option>
                            </select>
                        </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    <div class="contenedor">
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Fuente de contacto</th>
                <th>Posible</th>
                <th>Clasificación</th>
                <th>Llamada</th>
                <th>Contestada</th>
                <th>Interesado</th>
                <th>Cita</th>
                <th>Clave SIR</th>
                <th>Fovissste</th>
                <th>Infonavit</th>
                <th>Bancario</th>
                <th>Comentario</th>
                <th>Valor</th>
                <th>Semana</th>
                <th>Mes</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contactos as $contacto)
                <tr data-contacto="{{ json_encode($contacto) }}" class="editar-contacto">
                    <td class="text-center">{{ $contacto->nombre }}</td>
                    <td class="text-center">{{ $contacto->telefono }}</td>
                    <td class="text-center">{{ $contacto->correo }}</td>
                    <td class="text-center">{{ $contacto->fuenteContacto['nombre_fuente'] }}</td>
                    <td class="text-center">{{ $contacto->posible }}</td>
                    <td class="text-center">{{ $contacto->clasificacion }}</td>
                    <td class="text-center">{{ $contacto->llamada ? 'Verdadero' : 'Falso' }}</td>
                    <td class="text-center">{{ $contacto->contestada ? 'Verdadero' : 'Falso' }}</td>
                    <td class="text-center">{{ $contacto->interesado ? 'Verdadero' : 'Falso' }}</td>
                    <td class="text-center">{{ $contacto->cita ? 'Verdadero' : 'Falso' }}</td>
                    <td class="text-center">{{ $contacto->clave_sir ? 'Verdadero' : 'Falso' }}</td>
                    <td class="text-center">{{ $contacto->fovissste ? 'Verdadero' : 'Falso' }}</td>
                    <td class="text-center">{{ $contacto->infonavit ? 'Verdadero' : 'Falso' }}</td>
                    <td class="text-center">{{ $contacto->bancario ? 'Verdadero' : 'Falso' }}</td>
                    <td class="text-center">{{ $contacto->comentario }}</td>
                    <td class="text-center">{{ $contacto->valor }}</td>
                    <td class="text-center">{{ $contacto->semana }}</td>
                    <td class="text-center">{{ $contacto->mes }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
                

   
<<!-- Modal para editar el teléfono y correo -->
<div class="modal fade" id="modalEditarContacto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modalEditarContacto1">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Contacto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarContacto" method="POST" action="{{ route('contacto.update', ['id' => '__ID__']) }}">
                    @method('PATCH')
                    @csrf
                    <input type="hidden" id="edit_user_id" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" id="edit_contacto_id" name="id">
                    <div class="mb-3">
                        <label for="edit_nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="edit_nombre" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="edit_telefono" class="form-label">Teléfono:</label>
                        <input type="text" class="form-control" id="edit_telefono" name="telefono">
                    </div>
                    <div class="mb-3">
                        <label for="edit_correo" class="form-label">Correo:</label>
                        <input type="email" class="form-control" id="edit_correo" name="correo">
                    </div>
                    <div class="mb-3">
                         <label for="edit_fuente_contacto" class="form-label">Fuente de Contacto:</label>
                            <select class="form-select" id="edit_fuente_contacto" name="fuente_contacto_id">
                            @foreach ($fuentes_contacto as $fuente)
                            <option value="{{ $fuente->id }}">{{ $fuente->nombre_fuente}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_posible" class="form-label">Posible:</label>
                        <select class="form-select" id="edit_posible" name="posible">
                            <option value="Comprador">Comprador</option>
                            <option value="Vendedor">Vendedor</option>
                            <option value="Arrendador">Arrendador</option>
                            <option value="Arrendatario">Arrendatario</option>
                            <option value="Referido">Referido</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_clasificacion" class="form-label">Clasificación:</label>
                        <select class="form-select" id="edit_clasificacion" name="clasificacion">
                            <option value="A">A</option>
                            <option value="B">B</option>
                        </select>
                    </div> 
                    <div class="mb-3">
                        <label for="edit_llamada" class="form-label">Llamada:</label>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="llamada" id="edit_llamada_si" value="1">
                        <label class="form-check-label" for="edit_llamada_si">Verdadero</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="llamada" id="edit_llamada_no" value="0">
                        <label class="form-check-label" for="edit_llamada_no">Falso</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_contestada" class="form-label">Contestada:</label>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="contestada" id="edit_contestada_si" value="1">
                        <label class="form-check-label" for="edit_contestada_si">Verdadero</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="contestada" id="edit_contestada_no" value="0">
                        <label class="form-check-label" for="edit_contestada_no">Falso</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_interesado" class="form-label">Interesado:</label>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="interesado" id="edit_interesado_si" value="1">
                        <label class="form-check-label" for="edit_interesado_si">Verdadero</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="interesado" id="edit_interesado_no" value="0">
                        <label class="form-check-label" for="edit_interesado_no">Falso</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_cita" class="form-label">Cita:</label>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="cita" id="edit_cita_si" value="1">
                        <label class="form-check-label" for="edit_cita_si">Verdadero</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="cita" id="edit_cita_no" value="0">
                        <label class="form-check-label" for="edit_cita_no">Falso</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_clave_sir" class="form-label">Clave SIR:</label>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="clave_sir" id="edit_clave_sir_si" value="1">
                        <label class="form-check-label" for="edit_clave_sir_si">Verdadero</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="clave_sir" id="edit_clave_sir_no" value="0">
                        <label class="form-check-label" for="edit_clave_sir_no">Falso</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_fovissste" class="form-label">Fovissste:</label>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="fovissste" id="edit_fovissste_si" value="1">
                        <label class="form-check-label" for="edit_fovissste_si">Verdadero</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="fovissste" id="edit_fovissste_no" value="0">
                        <label class="form-check-label" for="edit_fovissste_no">Falso</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_infonavit" class="form-label">Infonavit:</label>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="infonavit" id="edit_infonavit_si" value="1">
                        <label class="form-check-label" for="edit_infonavit_si">Verdadero</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="infonavit" id="edit_infonavit_no" value="0">
                        <label class="form-check-label" for="edit_infonavit_no">Falso</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_bancario" class="form-label">Bancario:</label>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bancario" id="edit_bancario_si" value="1">
                        <label class="form-check-label" for="edit_bancario_si">Verdadero</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="bancario" id="edit_bancario_no" value="0">
                        <label class="form-check-label" for="edit_bancario_no">Falso</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_comentario" class="form-label">Comentario:</label>
                        <textarea class="form-control" id="edit_comentario" name="comentario" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_valor" class="form-label">Valor:</label>
                        <input type="text" class="form-control" id="edit_valor" name="valor">
                    </div>
                    <div class="mb-3">
                        <label for="edit_semana" class="form-label">Semana:</label>
                        <select class="form-select" id="edit_semana" name="semana">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_mes" class="form-label">Mes:</label>
                        <select class="form-select" id="edit_mes" name="mes">
                            <option value="Enero">Enero</option>
                            <option value="Febrero">Febrero</option>
                            <option value="Marzo">Marzo</option>
                            <option value="Abril">Abril</option>
                            <option value="Mayo">Mayo</option>
                            <option value="Junio">Junio</option>
                            <option value="Julio">Julio</option>
                            <option value="Agosto">Agosto</option>
                            <option value="Septiembre">Septiembre</option>
                            <option value="Octubre">Octubre</option>
                            <option value="Noviembre">Noviembre</option>
                            <option value="Diciembre">Diciembre</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                @if ($permiso == "limited")
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <button type="button" class="btn btn-danger" id="btnEliminarContacto">Eliminar</button>
                @endif
            </div>
        </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var botonesEditarContacto = document.querySelectorAll('.editar-contacto');

        botonesEditarContacto.forEach(function (boton) {
            boton.addEventListener('click', function () {
                var contacto = JSON.parse(boton.getAttribute('data-contacto'));

                // Llenar los campos en el formulario con los datos del contacto
                document.getElementById('edit_contacto_id').value = contacto.id;
                document.getElementById('edit_nombre').value = contacto.nombre;
                document.getElementById('edit_telefono').value = contacto.telefono;
                document.getElementById('edit_correo').value = contacto.correo;


                // Seleccionar la fuente de contacto actual
                var fuenteContactoSelect = document.getElementById('edit_fuente_contacto');
                for (var i = 0; i < fuenteContactoSelect.options.length; i++) {
                    if (fuenteContactoSelect.options[i].value == contacto.fuente_contacto_id) {
                        fuenteContactoSelect.options[i].selected = true;
                    }
                }

                // Seleccionar la opción de "posible" actual
                document.getElementById('edit_posible').value = contacto.posible;

                // Seleccionar la opción de "clasificación" actual
                document.getElementById('edit_clasificacion').value = contacto.clasificacion;

                // Seleccionar la opción de "contestada" actual
                document.getElementById('edit_llamada_si').checked = contacto.llamada == 1;
                document.getElementById('edit_llamada_no').checked = contacto.llamada == 0;
                document.getElementById('edit_contestada_si').checked = contacto.contestada == 1;
                document.getElementById('edit_contestada_no').checked = contacto.contestada == 0;
                document.getElementById('edit_interesado_si').checked = contacto.interesado == 1;
                document.getElementById('edit_interesado_no').checked = contacto.interesado == 0;
                document.getElementById('edit_cita_si').checked = contacto.cita == 1;
                document.getElementById('edit_cita_no').checked = contacto.cita == 0;
                document.getElementById('edit_clave_sir_si').checked = contacto.clave_sir == 1;
                document.getElementById('edit_clave_sir_no').checked = contacto.clave_sir == 0;
                document.getElementById('edit_fovissste_si').checked = contacto.fovissste == 1;
                document.getElementById('edit_fovissste_no').checked = contacto.fovissste == 0;
                document.getElementById('edit_infonavit_si').checked = contacto.infonavit == 1;
                document.getElementById('edit_infonavit_no').checked = contacto.infonavit == 0;
                document.getElementById('edit_bancario_si').checked = contacto.bancario == 1;
                document.getElementById('edit_bancario_no').checked = contacto.bancario == 0;
               
                // Llenar el área de texto con el comentario actual
                document.getElementById('edit_comentario').value = contacto.comentario;

                // Llenar el campo "valor" con el valor actual
                document.getElementById('edit_valor').value = contacto.valor;

                 // Seleccionar la opción de "semana" actual
                document.getElementById('edit_semana').value = contacto.semana;

                 // Seleccionar la opción de "mes" actual
                 document.getElementById('edit_mes').value = contacto.mes;

                // Actualizar la acción del formulario con el ID del contacto
                document.getElementById('formEditarContacto').action = '{{ url('contacto') }}/' + contacto.id;

                // Abrir el modal de edición
                var modalEditarContacto = new bootstrap.Modal(document.getElementById('modalEditarContacto'));
                modalEditarContacto.show();
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var btnEliminarContacto = document.getElementById('btnEliminarContacto');

        btnEliminarContacto.addEventListener('click', function () {
            // Mostrar confirmación antes de eliminar
            var confirmacion = confirm('¿Estás seguro de que deseas eliminar este contacto?');
            
            if (confirmacion) {
                // Obtener el ID del contacto a eliminar
                var contactoId = document.getElementById('edit_contacto_id').value;

                // Enviar la solicitud de eliminación al controlador
                window.location.href = '{{ url('contacto') }}/' + contactoId + '/eliminar';
            }
        });
    });
</script>
<script src="{{ asset('js/nav.js') }}"></script>
   

</body>
</html>