<?php
use App\Models\FuenteContacto;
$fuentes_contacto = FuenteContacto::all();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <br>
    <br>
    <title>Registro de Cierre</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style6.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>


    <header>
        <?php echo $__env->make('navCierre', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>
    <div class="center">
    <div class="estilo-random">
            <h1 class="texto-grande">Registro de Cierre</h1>
        </div>
        <div class="container-scroll">
    <form method="post" action="<?php echo e(route('registrocierre.store')); ?>" class="mt-4" autocomplete="off">
        <?php echo csrf_field(); ?>
        <div class="row mb-3">
            <div class="col">
                <label for="cerro" class="form-label">Cerro:</label>
                <select id="cerro" name="cerro" class="form-select" required>
                    <option value="" selected>Elige</option>
                    <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $nombre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>"><?php echo e($nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="col">
                <label for="ingreso" class="form-label">Ingreso:</label>
                <select id="ingreso" name="ingreso" class="form-select" required>
                    <option value="" selected>Elige</option>
                    <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $nombre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($id); ?>"><?php echo e($nombre); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <!-- Repite esta estructura para otros campos -->

        <div class="row mb-3">
    <div class="col">
        <label for="montoPropiedad" class="form-label">Monto de Propiedad:</label>
        <input type="text" id="montoPropiedad" name="monto_propiedad" class="form-control" required pattern="\d*">
        <small class="form-text text-muted">Ingrese solo caracteres numéricos.</small>
    </div>

            <div class="col">
                <label for="recurso" class="form-label">Recurso:</label>
                <select id="recurso" name="recurso" class="form-select" required>
                    <option value="" selected>Elige</option>
                    <option value="FOVISSSTE">FOVISSSTE</option>
                    <option value="INFONAVIT">INFONAVIT</option>
                    <option value="Credito Bancario">Crédito Bancario</option>
                    <option value="Recursos Propios">Recursos Propios</option>
                    <option value="IMSS">IMSS</option>
                    <option value="Alia2">Alia2</option>
                    <option value="Caja de Ahorro">Caja de Ahorro</option> 
                    <option value="Cofinavit">Cofinavit</option>
                    
                </select>
            </div>
        </div>

        <!-- Repite esta estructura para otros campos -->

        <div class="row mb-3">
            <div class="col">
                <label for="estadoCivil" class="form-label">Estado Civil:</label>
                <select id="estadoCivil" name="estado_civil" class="form-select" required>
                    <option value="" selected>Elige</option>
                    <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
        <div class="col">
        <div class="form-group">
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" class="form-control" required>
        </div>
        </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="fuenteContacto" class="form-label">Fuente de Contacto:</label>
                <select id="fuenteContacto" name="fuente_contacto" class="form-select" required>
                    <option value="" selected>Elige</option>
                    <?php $__currentLoopData = $fuentes_contacto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fuente_contacto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($fuente_contacto->id); ?>"><?php echo e($fuente_contacto->nombre_fuente); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
    <div class="col">
        <label for="genero" class="form-label">Género:</label>
        <select id="genero" name="genero" class="form-select" required>
            <option value="" selected>Elige</option>
            <option value="Hombre">Hombre</option>
            <option value="Mujer">Mujer</option>
        </select>
    </div>
    <div class="col">
        <label for="rangoEdad" class="form-label">Rango de Edad:</label>
        <select id="rangoEdad" name="rango_edad" class="form-select" required>
            <option value="" selected>Elige</option>
            <option value="20-30">20-30</option>
            <option value="30-40">30-40</option>
            <option value="40-50">40-50</option>
            <option value="50-60">50-60</option>
        </select>
    </div>
</div>
<div class="col">
        <label for="porcentaje_comision" class="form-label">Porcentaje de comision:</label>
        <input type="text" id="porcentaje_comision" name="porcentaje_comision" class="form-control" required pattern="\d*">
        <small class="form-text text-muted">Ingrese solo caracteres numéricos.</small>
    </div>
    <div class="row mb-3">
    <div class="col">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="modoDeveloper" name="modo_developer" value="1">
            <label class="form-check-label" for="modoDeveloper">
                ¿Es developer? (Aplica 50% oficina / 50% developer)
            </label>
        </div>
    </div>
</div>
        <div class="row">
            <div class="col">
                <input type="submit" value="Guardar" class="btn btn-primary mt-3">
            </div>
        </div>
    </form>
</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
        crossorigin="anonymous"></script>
    <script>
        var miToast = document.getElementById("mi-toast");
        var toast = new bootstrap.Toast(miToast);
        toast.show();
    </script>
</body>

</html><?php /**PATH C:\laragon\www\agenda.remaxvictoria.mx\resources\views/registrocierre.blade.php ENDPATH**/ ?>