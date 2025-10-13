<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda</title>
    <link rel="stylesheet" href="{{ asset('css/style3.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <header>
        @include('nav')
    </header>
    <div id="borraractt">
      <svg xmlns="http://www.w3.org/2000/svg" id="borraract" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
      </svg>
    </div>
    <div id="borraracttt">
      <p>ARRASTRA LA ACTIVIDAD PARA ELIMINAR</p>
    </div>
    <div class="todo" permiso="{{$permiso}}">
      <div class="botonson" id="toggleButton2">
        >
      </div>
      <div id="toggleButton"></div>
      <div class="listas">
        <div id="dashboard" class="">
          <div id="hideButton"><</div>
          <hr>
          <h3>ACTIVIDADES</h3>
          <hr>
          <div class="actcuad">
            @foreach($actividades as $actividad)
              <div class="cuad-act" id="caja" data-actividad-id="{{ $actividad->id }}">
                @if ($permiso == 'limited')
                <button class="btn btn-primary open-modal" data-bs-target="#agendar-{{ $actividad->id }}" data-bs-toggle="modal" id="nactividad">
                  {{ $actividad->nombre_actividad }}
                </button>
                @endif
                @if ($permiso == 'full')
                <button class="btn btn-primary open-modal" data-bs-target="#actividadModal-{{ $actividad->id }}" data-bs-toggle="modal" id="nactividad">
                  {{ $actividad->nombre_actividad }}
                </button>
                @endif
              </div>
              <div class="modal fade" id="actividadModal-{{ $actividad->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Detalles de la actividad</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <h5 id="numeroact"></h5>
                      <form action="{{ url('actividades/'.$actividad->id) }}" method="POST" id="editform">
                      <textarea name="nombre_actividad" id="actividadDetalle-{{ $actividad->id }}" class="actividadDetalle" ></textarea>
                      @if ($permiso == 'full')
                      <input type="hidden" name="id" value="{{$id}}">
                      @endif
                    </div>
                    <div class="modal-footer">
                        {{ method_field('PUT') }}
                        <button type="text" class="btn btn-warning" id="edit_mostrar">Editar</button>
                      </form>
                      <form action="{{ url('actividades/'.$actividad->id) }}" method="POST" id="deleteform">
                        {{ method_field('DELETE') }}
                        @if ($permiso == 'full')
                        <input type="hidden" name="id" value="{{$id}}">
                        @endif
                        <button type="submit" class="btn btn-danger" id="delete_btn">Eliminar</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal fade" id="agendar-{{$actividad->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Agendar en</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <label for="" class="form-label" style="color: black">Selecciona el dia y momento</label>
                      <select  id="selectMomento-{{$actividad->id}}" class="form-select" aria-label="Default select example">
                        <option value="Lunes-m">Lunes-Matutina</option>
                        <option value="Lunes-me">Lunes-Madio Dia</option>
                        <option value="Lunes-ves">Lunes-Vespertino</option>
                        <option value="Martes-m">Martes-Matutina</option>
                        <option value="Martes-me">Martes-Madio Dia</option>
                        <option value="Martes-ves">Martes-Vespertino</option>
                        <option value="Miercoles-m">Miercoles-Matutina</option>
                        <option value="Miercoles-me">Miercoles-Madio Dia</option>
                        <option value="Miercoles-ves">Miercoles-Vespertino</option>
                        <option value="Jueves-m">Jueves-Matutina</option>
                        <option value="Jueves-me">Jueves-Madio Dia</option>
                        <option value="Jueves-ves">Jueves-Vespertino</option>
                        <option value="Viernes-m">Viernes-Matutina</option>
                        <option value="Viernes-me">Viernes-Madio Dia</option>
                        <option value="Viernes-ves">Viernes-Vespertino</option>
                        <option value="Sabado-m">Sabado-Matutina</option>
                        <option value="Sabado-me">Sabado-Madio Dia</option>
                        <option value="Sabado-ves">Sabado-Vespertino</option>
                      </select>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <button type="button" class="btn btn-primary" onclick="agendar('{{$actividad->nombre_actividad}}', '{{$actividad->id}}')">Agendar</button>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          @if($permiso == 'full')
            <button type="button" class="btn btn-primary ag" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Agregar Tarea
            </button>
          @endif
        </div>
        <div id="content">
          <!-- Contenido principal -->
        </div> 
        <div class="dia">
          <div class="titulo">{{ $diasSemana[0]-> nombre_dia}}</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="Lunes-m"></div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio Dia</div>
            <div class="dropc" id="Lunes-me"></div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="Lunes-ves"></div>
          </div>
        </div>
        <div class="dia">
          <div class="titulo">{{ $diasSemana[1]-> nombre_dia}}</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="Martes-m"></div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio dia</div>
            <div class="dropc" id="Martes-me"></div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="Martes-ves"></div>
          </div>
        </div>
        <div class="dia">
          <div class="titulo">{{ $diasSemana[2]-> nombre_dia}}</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="Miercoles-m"></div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio dia</div>
            <div class="dropc" id="Miercoles-me"></div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="Miercoles-ves"></div>
          </div>
        </div>
        <div class="dia">
          <div class="titulo">{{ $diasSemana[3]-> nombre_dia}}</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="Jueves-m"></div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio dia</div>
            <div class="dropc" id="Jueves-me"></div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="Jueves-ves"></div>
          </div>
        </div>
        <div class="dia">
          <div class="titulo">{{ $diasSemana[4]-> nombre_dia}}</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="Viernes-m"></div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio dia</div>
            <div class="dropc" id="Viernes-me"></div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="Viernes-ves"></div>
          </div>
        </div>
        <div class="diaf">
          <div class="titulo">{{ $diasSemana[5]-> nombre_dia}}</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="Sabado-m"></div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio dia</div>
            <div class="dropc" id="Sabado-me"></div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="Sabado-ves"></div>
          </div>
        </div>
      </div>
        <div class="agregar">
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Agrega una actividad</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ url('actividades') }}" method="POST">
                    <div class="mb-3">
                      <label for="actividadInput" class="form-label">Actividad</label>
                      <input type="text" class="form-control" id="actividadInput" name="nombre_actividad" aria-describedby="emailHelp" required>
                      @if ($permiso == 'full')
                      <input type="hidden" name="id" value="{{$id}}">
                      @endif
                      <div id="emailHelp" class="form-text">Esta actividad se mostrará para los agentes inmobiliarios</div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary" id="guardarActividad">Guardar Actividad</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
         </div>
         <div class="editdelete">
          @if ($permiso == "full")
            <a href="{{ route('ver-agenda', ['id' => $id]) }}" class="btn btn-secondary ag"><-- Agendas</a>
          @endif
          @if ($permiso == "limited")
            <a href="{{ route('agendas') }}" class="btn btn-secondary ag"><-- Agendas</a>
            <button type="button" class="btn btn-primary ag" id="editaragenda" data-bs-toggle="modal" data-bs-target="#modal_agenda">Guardar Agenda</button>
          @endif
         </div>
          <div class="modal fade" id="modal_agenda" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content" id="modal">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">Guardar Agenda</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="contenedorInputs" user-id="{{$user_id}}">
                            <div class="mb-3">
                                <label for="semana" class="form-label">Año:</label>
                                <select class="form-select" name="semana" id="inputAno">
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                </select>
                            </div>
    
                            <div class="mb-3">
                                <label for="mes" class="form-label">Mes:</label>
                                <select class="form-select" name="mes" id="inputMes">
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

                            <div class="mb-3">
                              <label for="semana" class="form-label">Semana:</label>
                              <select class="form-select" name="semana" id="inputSemana">
                                  <option value="1">Semana 1</option>
                                  <option value="2">Semana 2</option>
                                  <option value="3">Semana 3</option>
                                  <option value="4">Semana 4</option>
                              </select>
                          </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="guardar-agenda">Guardar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="snackbar">Agenda Guardada</div>
    <div id="snackbar2">Hubo un error inesperado, Intenta de nuevo</div>
    <div id="snackbar3">Hay una agenda ya registrada en esta fecha</div>
    @if(isset($actividadDuplicada) && $actividadDuplicada)
      <div id="snackbar4">Ya hay una actividad con ese nombre</div>
    @endif
    <script>
      var agendaStoreUrl = "{{ route('agendas') }}";
      var checkDuplicateUrl = "{{ route('agendasCheck') }}";
      var zsd = document.getElementById("snackbar4");
      zsd.className = "show";
      setTimeout(function(){ zsd.className = zsd.className.replace("show", ""); }, 3000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/appMovil.js') }}"></script>
    <script src="{{ asset('js/nav.js') }}"></script>
</body>
</html>