<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estadisticas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset('css/style7.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <header>
        @include('nav')
    </header>
    <div class="search">
        <form action="{{route('statsglobales')}}" method="post" class="buscador" id="#miFormulario">
            @csrf
            <select class="form-select form-select-sm" aria-label="Default select example" id="inputt" placeholder="Mes" name="inputt">
                <option selected>Selecciona Fecha</option>
                @foreach ($diccionario as $mes => $semanas)
                    @foreach ($semanas as $semana)
                        <option value="{{ $mes }}/{{ $semana }}">
                            {{ $mes }} Semana {{ $semana }}
                        </option>
                    @endforeach
                @endforeach
            </select>
            <button type="submit" class="lupa-cuad">
                <svg class="lupa" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </form>
    </div>
    <div class="estadisticas">
        <div class="grafica" @isset($tipo) tipo="{{ $tipo }}" @endisset>
            <div class="cabecera">
                @if(isset($llamadas))
                    <p class="parametro" id="parametro">LLamadas: {{$llamadas}}</p>
                @else
                    <p class="parametro">LLamadas: ---</p>
                @endif
                @if(isset($contestadas))
                <p class="parametro">Contestadas: {{$contestadas}}</p>
                @else
                <p class="parametro">Contestadas: ---</p>
                @endif
                @if(isset($interesados))
                <p class="parametro">Interesados: {{$interesados}}</p>
                @else
                <p class="parametro">Interesados: ---</p>
                @endif
                @if(isset($citas))
                <p class="parametro">Citas: {{$citas}}</p>
                @else
                <p class="parametro">Citas: ---</p>
                @endif
                @if(isset($semanapuesta))
                <p class="parametro">Semana: {{$semanapuesta}}</p>
                @else
                <p class="parametro">Semana: ---</p>
                @endif
                @if(isset($mespuesto))
                <p class="parametro">Mes: {{$mespuesto}}</p>
                @else
                <p class="parametro">Mes: ---</p>
                @endif
            </div>
            <div class="programming-stats">
                <div class="chart-container">
                  <canvas class="my-chart" id="grafica"></canvas>
                </div>
                <div class="details">
                    @isset($citas2)<h5 id="titulo-ul">FUENTES DE CONTACTO:</h5>@endisset
                  <ul id="ul-1">
                  </ul>
                </div>
            </div>
        </div>
        <div class="tabla">
            <table>
                <thead>
                    <tr>
                        <th class="colprin">Fuente de contacto</th>
                        <th class="colprin">Total de contactos</th>
                        <th class="colprin">Citas concretadas</th>
                        <th class="colfin">Conversion</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($tabla)
                    @foreach ($tabla as $clave => $valor)
                    <tr>
                        <td>{{$clave}}</td>
                        <td>{{$valor[0]}}</td>
                        <td>{{$valor[1]}}</td>
                        <td>
                            @if ($valor[0] > 0)
                            {{ number_format(($valor[1] / $valor[0]) * 100, 2) }}%
                            @else
                            0
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
    <div class="estadisticas" @isset($citas2) citas="{{ $citas2 }}" @endisset id="estadisticas">
        <div class="grafica">
            <div class="cabecera">
                @if(isset($contactos))
                    <p class="parametro">CONTACTOS TOTALES: {{$contactos}}</p>
                @else
                    <p class="parametro">CONTACTOS TOTALES: ---</p>
                @endif
            </div>
            <div class="programming-stats" id="programming2">
                <div class="chart-container">
                  <canvas class="my-chart" id="grafica2"></canvas>
                </div>
                <div class="details" id="details2">
                    @isset($citas2)<h5 id="titulo-ul">CITAS TOTALES:</h5>@endisset
                  <ul></ul>
                </div>
            </div>
        </div>
        <div class="tabla">
            <table>
                <thead>
                    <tr>
                        <th class="colprin">Fuente de contacto</th>
                        <th class="colprin">Total de contactos</th>
                        <th class="colprin">Citas concretadas</th>
                        <th class="colfin">Conversion</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($tabla)
                    @foreach ($tabla as $clave => $valor)
                    <tr>
                        <td>{{$clave}}</td>
                        <td>{{$valor[0]}}</td>
                        <td>{{$valor[1]}}</td>
                        <td>
                            @if ($valor[0] > 0)
                            {{ number_format(($valor[1] / $valor[0]) * 100, 2) }}%
                            @else
                            0
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/nav.js') }}"></script>
    <script src="{{ asset('js/app5.js') }}"></script>
</body>
</html>