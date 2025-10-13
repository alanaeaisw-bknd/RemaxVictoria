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
    <div class="todo" permiso="{{$permiso}}">
      <div class="botonson" id="toggleButton2">
        >
      </div>
      <div id="toggleButton"></div>
      <div class="listas">
        <div id="dashboard" class="closed">
          <div id="hideButton"><</div>
          <hr>
          <h3>AGENDAS</h3>
          <hr>
          <div class="actcuad">
            <div class="accordion" id="accordionExample">
              @foreach ($diccionario as $ano => $meses)
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$ano}}" aria-expanded="true" aria-controls="collapseOne">
                    {{ $ano }}
                  </button>
                </h2>
                <div id="collapse{{$ano}}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body" id="accordion-body">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                      @foreach ($meses as $mes => $semanas)
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" id="boton-acordion-2" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse{{$mes}}" aria-expanded="false" aria-controls="flush-collapseOne">
                              {{$mes}}
                            </button>
                        </h2>
                        <div id="flush-collapse{{$mes}}" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                          <div class="list-group">
                            @foreach ($semanas as $semana)
                            @if ($permiso == 'limited')
                            <a href="{{ url("/agenda/{$ano}/{$mes}/{$semana}") }}" class="list-group-item list-group-item-action" id="boton-semana">SEMANA {{$semana}}</a>
                            @endif
                            @if ($permiso == 'full')
                            <a href="{{ url("/agenda/{$ano}/{$mes}/{$semana}/{$id}") }}" class="list-group-item list-group-item-action" id="boton-semana">SEMANA {{$semana}}</a>
                            @endif
                            @endforeach
                          </div>
                        </div>
                      </div>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          @if ($permiso == 'full')
          <button type="button" class="btn btn-primary ag" id="new">
            Ver Actividades
          </button>
          @endif
          @if ($permiso == 'limited')
          <button type="button" class="btn btn-primary ag" id="new">
            Nueva Agenda
          </button>
          @endif
        </div>
        <div id="content">
          <!-- Contenido principal -->
        </div> 
        <div class="dia">
          <div class="titulo">Lunes</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="contenedor" dia="1" momento="Mañana">
                @foreach ($registros as $registro)
                    @if ($registro->dia_semana_id == 1)
                        @if ($registro->momento_dia == 'Mañana')
                            @if ($registro->estado == 0)
                            <div class="cho" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                            @if ($registro->estado == 1)
                            <div class="cha" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif   
                        @endif
                    @endif
                @endforeach
            </div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio Dia</div>
            <div class="dropc" id="contenedor" dia="1" momento="Tarde">
                @foreach ($registros as $registro)
                    @if ($registro->dia_semana_id == 1)
                        @if ($registro->momento_dia == 'Tarde')
                            @if ($registro->estado == 0)
                            <div class="cho" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                            @if ($registro->estado == 1)
                            <div class="cha" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                        @endif
                    @endif
                @endforeach
            </div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="contenedor" dia="1" momento="Noche">
                @foreach ($registros as $registro)
                    @if ($registro->dia_semana_id == 1)
                        @if ($registro->momento_dia == 'Noche')
                            @if ($registro->estado == 0)
                            <div class="cho" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                            @if ($registro->estado == 1)
                            <div class="cha" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                        @endif
                    @endif
                @endforeach
            </div>
          </div>
        </div>
        <div class="dia">
          <div class="titulo">Martes</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="contenedor" dia="2" momento="Mañana">
                @foreach ($registros as $registro)
                    @if ($registro->dia_semana_id == 2)
                        @if ($registro->momento_dia == 'Mañana')
                            @if ($registro->estado == 0)
                            <div class="cho" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                            @if ($registro->estado == 1)
                            <div class="cha" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                        @endif
                    @endif
                @endforeach
            </div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio dia</div>
            <div class="dropc" id="contenedor" dia="2" momento="Tarde">
                @foreach ($registros as $registro)
                    @if ($registro->dia_semana_id == 2)
                        @if ($registro->momento_dia == 'Tarde')
                            @if ($registro->estado == 0)
                            <div class="cho" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                            @if ($registro->estado == 1)
                            <div class="cha" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                        @endif
                    @endif
                @endforeach
            </div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="contenedor" dia="2" momento="Noche">
                @foreach ($registros as $registro)
                    @if ($registro->dia_semana_id == 2)
                        @if ($registro->momento_dia == 'Noche')
                            @if ($registro->estado == 0)
                            <div class="cho" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                            @if ($registro->estado == 1)
                            <div class="cha" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                        @endif
                    @endif
                @endforeach
            </div>
          </div>
        </div>
        <div class="dia">
          <div class="titulo">Miercoles</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="contenedor" dia="3" momento="Mañana">
                @foreach ($registros as $registro)
                    @if ($registro->dia_semana_id == 3)
                        @if ($registro->momento_dia == 'Mañana')
                            @if ($registro->estado == 0)
                            <div class="cho" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                            @if ($registro->estado == 1)
                            <div class="cha" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                        @endif
                    @endif
                @endforeach
            </div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio dia</div>
            <div class="dropc" id="contenedor" dia="3" momento="Tarde">
                @foreach ($registros as $registro)
                    @if ($registro->dia_semana_id == 3)
                        @if ($registro->momento_dia == 'Tarde')
                            @if ($registro->estado == 0)
                            <div class="cho" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                            @if ($registro->estado == 1)
                            <div class="cha" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                        @endif
                    @endif
                @endforeach
            </div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="contenedor" dia="3" momento="Noche">
                @foreach ($registros as $registro)
                    @if ($registro->dia_semana_id == 3)
                        @if ($registro->momento_dia == 'Noche')
                            @if ($registro->estado == 0)
                              <div class="cho" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                            @if ($registro->estado == 1)
                            <div class="cha" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad_["nombre_actividad"]}}</div>
                            @endif
                        @endif
                    @endif
                @endforeach
            </div>
          </div>
        </div>
        <div class="dia">
          <div class="titulo">Jueves</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="contenedor" dia="4" momento="Mañana">
                @foreach ($registros as $registro)
                    @if ($registro->dia_semana_id == 4)
                        @if ($registro->momento_dia == 'Mañana')
                            @if ($registro->estado == 0)
                            <div class="cho" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                            @if ($registro->estado == 1)
                            <div class="cha" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                        @endif
                    @endif
                @endforeach
            </div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio dia</div>
            <div class="dropc" id="contenedor" dia="4" momento="Tarde">
                @foreach ($registros as $registro)
                    @if ($registro->dia_semana_id == 4)
                        @if ($registro->momento_dia == 'Tarde')
                            @if ($registro->estado == 0)
                            <div class="cho" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                            @if ($registro->estado == 1)
                            <div class="cha" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                        @endif
                    @endif
                @endforeach
            </div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="contenedor" dia="4" momento="Noche">
                @foreach ($registros as $registro)
                    @if ($registro->dia_semana_id == 4)
                        @if ($registro->momento_dia == 'Noche')
                            @if ($registro->estado == 0)
                              <div class="cho" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                            @if ($registro->estado == 1)
                            <div class="cha" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                        @endif
                    @endif
                @endforeach
            </div>
          </div>
        </div>
        <div class="dia">
          <div class="titulo">Viernes</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="contenedor" dia="5" momento="Mañana">
                @foreach ($registros as $registro)
                    @if ($registro->dia_semana_id == 5)
                        @if ($registro->momento_dia == 'Mañana')
                            @if ($registro->estado == 0)
                              <div class="cho" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                            @if ($registro->estado == 1)
                            <div class="cha" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                        @endif
                    @endif
                @endforeach
            </div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio dia</div>
            <div class="dropc" id="contenedor" dia="5" momento="Tarde">
                @foreach ($registros as $registro)
                    @if ($registro->dia_semana_id == 5)
                        @if ($registro->momento_dia == 'Tarde')
                            @if ($registro->estado == 0)
                            <div class="cho" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                            @if ($registro->estado == 1)
                            <div class="cha" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                        @endif
                    @endif
                @endforeach
            </div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="contenedor" dia="5" momento="Noche">
                @foreach ($registros as $registro)
                    @if ($registro->dia_semana_id == 5)
                        @if ($registro->momento_dia == 'Noche')
                            @if ($registro->estado == 0)
                              <div class="cho" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                            @if ($registro->estado == 1)
                            <div class="cha" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                            
                        @endif
                    @endif
                @endforeach
            </div>
          </div>
        </div>
        <div class="diaf">
          <div class="titulo">Sabado</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="contenedor" dia="6" momento="Mañana">
                @foreach ($registros as $registro)
                    @if ($registro->dia_semana_id == 6)
                        @if ($registro->momento_dia == 'Mañana')
                            @if ($registro->estado == 0)
                            <div class="cho" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                            @if ($registro->estado == 1)
                            <div class="cha" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                        @endif
                    @endif
                @endforeach
            </div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio dia</div>
            <div class="dropc" id="contenedor" dia="6" momento="Tarde">
                @foreach ($registros as $registro)
                    @if ($registro->dia_semana_id == 6)
                        @if ($registro->momento_dia == 'Tarde')
                            @if ($registro->estado == 0)
                            <div class="cho" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                            @if ($registro->estado == 1)
                            <div class="cha" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                        @endif
                    @endif
                @endforeach
            </div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="contenedor" dia="6" momento="Noche">
                @foreach ($registros as $registro)
                    @if ($registro->dia_semana_id == 6)
                        @if ($registro->momento_dia == 'Noche')
                            @if ($registro->estado == 0)
                            <div class="cho" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                            @if ($registro->estado == 1)
                            <div class="cha" data-actividad-id="{{$registro->actividad_id}}" id="{{$registro->id}}" id-act="{{$registro->id}}" estado="{{$registro->estado}}">{{ $registro->actividad["nombre_actividad"] }}</div>
                            @endif
                        @endif
                    @endif
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      var agendaUpdateUrl = "{{ route('agendau') }}";
      var agendaUpdateEstadoUrl = "{{ route('agendaue') }}";
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app4.js') }}"></script>
    <script src="{{ asset('js/nav.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.getElementById("new").addEventListener("click", function() {
            window.location.href = "{{ route('actividades') }}";
        });
    </script>
</body>
</html>