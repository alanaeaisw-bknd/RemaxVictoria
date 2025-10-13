<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agentes</title>
    <link rel="stylesheet" href="{{ asset('css/style5.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <header>
        @include('nav')
    </header>
    <button type="button" class="btn btn-success" id="btn_agregar" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <img src="{{ asset('images\agregar.png') }}" alt="" id="suma">
    </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content" id="modal">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Usuario</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('inicioadmin/create') }}" method="POST">
                @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" class="form-control" name="nombre" placeholder="" required>
                        </div>

                        <div class="mb-3">
                            <label for="nombre_archivo_foto" class="form-label">Foto de perfil:</label>
                            <input type="text" name="nombre_archivo_foto" class="form-control" placeholder="" nullable>
                        </div>

                        <div class="mb-3">
                            <label for="correo_institucional" class="form-label">Correo Institucional:</label>
                            <input type="email" name="correo_institucional" class="form-control" placeholder="" required>
                        </div>

                        <div class="mb-3">
                            <label for="celular" class="form-label">Celular:</label>
                            <input type="text" name="celular" class="form-control" placeholder="" required>
                        </div>

                        <div class="mb-3">
                            <label for="sir" class="form-label">Sir:</label>
                            <input type="text" name="sir" class="form-control" placeholder="" nullable>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña:</label>
                            <input type="password" name="password" class="form-control" placeholder="" nullable>
                        </div>

                        <div class="mb-3">
                        <label for="permisos_id" class="form-label">Permisos:</label>
                        <select id="permisos_id" name="permisos_id" class="form-select" required>
                            <option value="" disabled selected>Seleccione un permiso</option>
                            @foreach ($permisos as $permiso)
                                <option value="{{ $permiso->id }}">{{ $permiso->name }}</option>
                            @endforeach
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




<div class="modal fade" id="modalEditarAgente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modalEditarA">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Agente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarAgente" method="POST" action="{{ route('agente.update', ['id' => '__ID__']) }}">
                    @method('PATCH')
                    @csrf

                    <input type="hidden" id="edit_agente_id" name="user_id">
                    <div class="mb-3">
                        <label for="edit_url_imagen" class="form-label">URL de la Imagen:</label>
                        <input type="text" class="form-control" id="edit_url_imagen" name="nombre_archivo_foto">
                    </div>
                    <div class="mb-3">
                        <label for="edit_nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="edit_nombre" name="nombre">
                    </div>
                    <div class="mb-3">
                    <label for="edit_correo" class="form-label">Correo Institucional:</label>
                    <input type="text" class="form-control" id="edit_correo" name="correo_institucional">
                    </div>
                    <div class="mb-3">
                    <label for="edit_celular" class="form-label">Celular:</label>
                    <input type="text" class="form-control" id="edit_celular" name="celular">
                    </div>
                    <div class="mb-3">
                    <label for="edit_sir" class="form-label">Sir:</label>
                    <input type="text" class="form-control" id="edit_sir" name="sir">
                    </div>
                    <div class="mb-3">
                        <label for="edit_permisos_id" class="form-label">Permiso:</label>
                        <select class="form-select" id="edit_permisos_id" name="permisos_id">
                            <!-- Aquí debes llenar las opciones con los permisos disponibles -->
                            @foreach ($permisos as $permiso)
                                <option value="{{ $permiso->id }}">{{ $permiso->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                    <label for="edit_password" class="form-label">Contraseña:</label>
                    <input type="password" class="form-control" id="edit_password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="edit_password_confirmation" class="form-label">Confirmar Contraseña:</label>
                        <input type="password" class="form-control" id="edit_password_confirmation" name="password_confirmation">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



 <!-- Sección de usuarios con permisos limited -->
    <div class="contenedor">
        <div class="cabecera">
            <h1></h1>
            <div class="input-group flex-nowrap" id="input">
                <span class="input-group-text" id="addon-wrapping">
                    <svg id="search" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </span>
                <input type="text" class="form-control" placeholder="Buscar agente" aria-label="Buscar agente" aria-describedby="addon-wrapping" id="inputt">
            </div>
        </div>
        <div class="cuerpo">
            <div class="titulos">
                <h4>AGENTES</h4>
                <h4 class="acciones">ACCIONES</h4>
            </div>
            @foreach ($agentes as $agente)
            @if ($agente->activo)
            <div class="agente-item">
            <div class="tabla editar-agente" data-agente="{{ json_encode($agente) }}">
                <div class="datos">
                    <div class="imagen">
                        <img src="{{ $agente->nombre_archivo_foto }}" alt="Foto del agente">
                    </div>
                    <div class="info">
                        <h6>{{$agente->nombre}}</h6>
                        <div class="logos">
                            <svg id="logo" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                            </svg>
                            <p class="agenteinfo">{{$agente->correo_institucional}}</p>
                        </div>
                        <div class="logos">
                            <svg id="logo" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>
                            <p class="agenteinfo">{{$agente->celular}}</p>
                        </div>
                        <div class="logos">
                            <svg id="logo" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                              </svg>
                            <p class="agenteinfo">{{$agente->sir}}</p>
                        </div>
                        @endif
                        <td>
                    </div>
                </div>
                <div class="accioness">
                    <div class="accion" id="ver-agenda">
                        <a href="{{ route('ver-agenda', ['id' => $agente->id, $permiso]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16" id="logotipo">
                                <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                            </svg>
                            <p class="ti">Ver</p>
                            <p class="ti">Agenda</p>
                        </a>
                    </div>
                    <div class="accion" id="ver-contactos" data-id="{{ $agente->id }}">
                        <a href="{{ route('ver-contactos', ['id' => $agente->id, $permiso]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard-fill" viewBox="0 0 16 16" id="logotipo">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5ZM9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8Zm1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Zm-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96c.026-.163.04-.33.04-.5ZM7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z"/>
                            </svg>
                            <p class="ti">Ver</p>
                            <p class="ti">Contactos</p>
                        </a>
                    </div>
                    <div class="accion">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-graph-up" viewBox="0 0 16 16" id="logotipo">
                            <path fill-rule="evenodd" d="M0 0h1v15h15v1H0V0Zm14.817 3.113a.5.5 0 0 1 .07.704l-4.5 5.5a.5.5 0 0 1-.74.037L7.06 6.767l-3.656 5.027a.5.5 0 0 1-.808-.588l4-5.5a.5.5 0 0 1 .758-.06l2.609 2.61 4.15-5.073a.5.5 0 0 1 .704-.07Z"/>
                        </svg>
                        <p class="ti">Ver</p>
                        <p class="ti">Estadisticas</p>
                    </div>
                    <div class="accion" id="accione" data-toggle="modal" data-target="#modalEditarAgente"> 
                       
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16" id="logotipo">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                    <p class="ti">Editar</p>
                    <p class="ti">Agente</p>
                </div>
                    <div class="accion" id="acciond" data-target="#miModal{{ $agente->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16" id="logotipo">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                        </svg>
                        <p class="ti">Eliminar</p>
                        <p class="ti">Agente</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="miModal{{ $agente->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Transferir Contactos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></button>
                    </div>
                    <div class="modal-body">
                        <form id="transferForm" method="post" action="{{ route('transferir-contactos') }}">
                            @csrf
                            <input type="hidden" name="agenteId" value="{{ $agente->id }}">
                            <div class="mb-3">
                                <label for="nuevoAgente" class="form-label">Seleccionar nuevo agente:</label>
                                <select class="form-select" id="nuevoAgente" name="nuevoAgente">
                                    @foreach($agentes as $agenteItem)
                                    <option value="{{ $agenteItem->id }}">{{ $agenteItem->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <ul>
                                @foreach($agente->contactos as $contacto)
                                <li>{{ $contacto->nombre }}</li>
                                @endforeach
                            </ul>
                            <button type="submit" class="btn btn-primary">Transferir contactos</button>
                        </form>
                    </div>            
                </div>
            </div>
        </div>
    @endforeach
 <!-- Sección de usuarios con permisos full -->
            <div class="titulos">
                <h4>USUARIO STAFF</h4>
                <h4 class="acciones">ACCIONES</h4>
            </div>
            @foreach ($usuariosStaff as $usuarioStaff)
        <div class="agente-item">
            <div class="tabla">
                <div class="datos">
                    <div class="imagen">
                        <img src="{{ $usuarioStaff->nombre_archivo_foto }}" alt="Foto del agente">
                    </div>
                    <div class="info">
                        <h6>{{$usuarioStaff->nombre}}</h6>
                        <div class="logos">
                            <svg id="logo" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
                            </svg>
                            <p class="agenteinfo">{{$usuarioStaff->correo_institucional}}</p>
                        </div>
                        <div class="logos">
                            <svg id="logo" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                            </svg>
                            <p class="agenteinfo">{{$usuarioStaff->celular}}</p>
                        </div>
                        <div class="logos">
                            <svg id="logo" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                              </svg>
                            <p class="agenteinfo">{{$usuarioStaff->sir}}</p>
                        </div>
                        <td>
                    </div>
                </div>
                <div class="accioness">
                    <div class="accion accionST" id="accioneST" data-toggle="modal" data-target="#editarUsuarioModal"
                        data-usuario-id="{{ $usuarioStaff->id }}"
                        data-usuario-nombre="{{ $usuarioStaff->nombre }}"
                        data-usuario-celular="{{ $usuarioStaff->celular }}"
                        data-usuario-foto="{{ $usuarioStaff->nombre_archivo_foto }}"
                        data-usuario-correo="{{ $usuarioStaff->correo_institucional }}"
                        data-usuario-sir="{{ $usuarioStaff->sir }}"  
                        data-usuario-permiso="{{ $usuarioStaff->permisos_id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16" id="logotipo">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            <p class="ti">Editar</p>
                            <p class="ti">Staff</p>
                    </div>
                    <div class="accion" id="acciond">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16" id="logotipo">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                        </svg>
                        <p class="ti">Eliminar</p>
                        <p class="ti">Staff</p>
                    </div>
                </div>
            </div>
        </div>
            @endforeach
<!-- Modal de Edición -->
<div class="modal fade" id="editarUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="editarUsuarioM">
            <div class="modal-header">
                <h5 class="modal-title" id="editarUsuarioModalLabel">Editar Usuario Staff</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario de Edición -->
                <form id="editarUsuarioForm" method="POST" action="{{ url('inicioadmin/actualizar-usuario-staff/' . $usuarioStaff->id) }}">
                @csrf
                @method('PATCH')
                    
                    <!-- Campos de edición (nombre, correo, teléfono, etc.) -->
                    <!-- Asegúrate de incluir un campo oculto para almacenar el ID del usuario -->
                    <input type="hidden" id="usuarioId" name="user_id" value="">
                    <!-- Agrega aquí los demás campos que deseas editar -->
                    <!-- Ejemplo: -->
                    <div class="mb-3">
                     <label for="nombre_archivo_foto">Nombre Archivo Foto:</label>
                     <input type="text" id="nombre_archivo_foto" name="nombre_archivo_foto" class="form-control" value="{{ $usuarioStaff->nombre_archivo_foto }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="correo_institucional">Correo Institucional:</label>
                        <input type="email" id="correo_institucional" name="correo_institucional" class="form-control" value="{{ $usuarioStaff->correo_institucional }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="celular">Celular:</label>
                        <input type="text" id="celular" name="celular" class="form-control" value="{{ $usuarioStaff->celular }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="sir">SIR:</label>
                        <input type="text" id="sir" name="sir" class="form-control" value="{{ $usuarioStaff->sir }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="permisos_id">Permisos:</label>
                        <select id="permisos_id" name="permisos_id" class="form-select">
                            @foreach ($permisos as $permiso)
                                <option value="{{ $permiso->id }}">{{ $permiso->name }}</option>
                            @endforeach
                        </select>
            </div>

                <!-- Campo "Contraseña" solo si se está creando una nueva contraseña -->
                <div class="mb-3">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>

                <!-- Campo "Confirmar Contraseña" solo si se está creando una nueva contraseña -->
                <div class="mb-3">
                    <label for="password_confirmation">Confirmar Contraseña:</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>
                



                    <!-- Botón de Guardar Cambios -->
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

   
            
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset('js/nav.js') }}"></script>
    
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var botonesEditarAgente = document.querySelectorAll('.accion#accione');

        botonesEditarAgente.forEach(function (boton) {
            boton.addEventListener('click', function () {
                var user = JSON.parse(boton.closest('.editar-agente').getAttribute('data-agente'));

                // Llenar los campos en el formulario con los datos del agente
                document.getElementById('edit_agente_id').value = user.id;
                document.getElementById('edit_nombre').value = user.nombre;
                document.getElementById('edit_correo').value = user.correo_institucional;
                document.getElementById('edit_celular').value = user.celular;
                document.getElementById('edit_sir').value = user.sir;
                document.getElementById('edit_url_imagen').value = user.nombre_archivo_foto;

                // Seleccionar el permiso correcto en el formulario
                document.getElementById('edit_permisos_id').value = user.permisos_id;

                  document.getElementById('edit_password').value = ''; 
                  // Limpiar el campo de contraseña por razones de seguridad

                    // Campo de confirmación de contraseña
                    document.getElementById('edit_password_confirmation').value = ''; // Limpiar el campo de confirmación
               

                // Actualizar la acción del formulario con el ID del user
                document.getElementById('formEditarAgente').action = '{{ url('inicioadmin') }}/' + user.id;

                // Abrir el modal de edición
                var modalEditarAgente = new bootstrap.Modal(document.getElementById('modalEditarAgente'));
                modalEditarAgente.show();
            });
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var botonesEditarStaff = document.querySelectorAll('.accionST');

        botonesEditarStaff.forEach(function (boton) {
            boton.addEventListener('click', function () {
                var usuarioId = boton.getAttribute('data-usuario-id');

                // Llenar los campos en el formulario con los datos del usuario Staff
                document.getElementById('usuarioId').value = usuarioId;
                document.getElementById('nombre').value = boton.getAttribute('data-usuario-nombre');
                document.getElementById('nombre_archivo_foto').value = boton.getAttribute('data-usuario-foto');
                document.getElementById('correo_institucional').value = boton.getAttribute('data-usuario-correo');
                document.getElementById('celular').value = boton.getAttribute('data-usuario-celular');
                document.getElementById('sir').value = boton.getAttribute('data-usuario-sir');


                // Establecer el permiso seleccionado en el campo de selección
                var permisoId = boton.getAttribute('data-usuario-permiso');
                var selectPermiso = document.getElementById('permisos_id');
                selectPermiso.value = permisoId;

                // Limpiar los campos de contraseña al abrir el modal
                document.getElementById('password').value = '';
                document.getElementById('password_confirmation').value = '';
                // Actualizar la acción del formulario con el ID del usuario Staff
                document.getElementById('editarUsuarioForm').action = '{{ url('inicioadmin') }}/' + usuarioId;

                // Abrir el modal de edición
                var modalEditarUsuario = new bootstrap.Modal(document.getElementById('editarUsuarioModal'));
                modalEditarUsuario.show();
            });
        });
    });
</script>
<script>
    $(document).ready(function () {

        var modalesID = document.querySelectorAll("#acciond");

        modalesID.forEach(function(modales){
            $(modales).on('click', function () {
            var modalId = modales.getAttribute("data-target");
            
            // Abre el modal correspondiente
            $(modalId).modal('show');
        });
    });
    });
</script>
<script>
    $(document).ready(function() {
        $('#inputt').on('keyup', function() {
            let searchTerm = $(this).val().toLowerCase();

            // Mostrar todos los agentes cuando el término de búsqueda está vacío
            if (searchTerm === '') {
                $('.agente-item').show();
                return;
            }

            // Oculta todos los agentes
            $('.agente-item').hide();

            // Muestra solo los agentes cuyo nombre coincide con la búsqueda
            $('.agente-item').filter(function() {
                return $(this).find('.info h6').text().toLowerCase().includes(searchTerm);
            }).show();
        });
    });
</script>





</body>
</html>

