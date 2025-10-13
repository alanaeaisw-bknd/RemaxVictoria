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
    <div class="todo">
      <div class="listas">
        <div class="dia">
          <div class="titulo">Lunes</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio Dia</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
        </div>
        <div class="dia">
          <div class="titulo">Martes</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio dia</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
        </div>
        <div class="dia">
          <div class="titulo">Miercoles</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio dia</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
        </div>
        <div class="dia">
          <div class="titulo">Jueves</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio dia</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
        </div>
        <div class="dia">
          <div class="titulo">Viernes</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio dia</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
        </div>
        <div class="diaf">
          <div class="titulo">Sabado</div>
          <div class="Matutina">
            <div class="tit">Matutina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Medio_Dia">
            <div class="tit">Medio dia</div>
            <div class="dropc" id="contenedor"></div>
          </div>
          <div class="Vespertina">
            <div class="tit">Vespertina</div>
            <div class="dropc" id="contenedor"></div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/nav.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>