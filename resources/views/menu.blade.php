<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <header>
        @include('nav')
    </header>
    <div class="cartas">
        <div class="carta" id="agenda">
            <img src="{{ asset('images\Group2.svg') }}" alt="">
            <h1 class="agenda">Agenda</h1>
        </div>
        <div class="carta" id="circulo">
            <img src="{{ asset('images\Group3.svg') }}" alt="">
            <h1 class="circulo">Contactos</h1>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script src="{{ asset('js/nav.js') }}"></script>
    <script>
        document.getElementById("agenda").addEventListener("click", function() {
            window.location.href = "{{ route('agendas') }}";
        });

        document.getElementById("circulo").addEventListener("click", function() {
            window.location.href = "{{ route('contactos') }}";
        });
        </script>
</body>
</html>