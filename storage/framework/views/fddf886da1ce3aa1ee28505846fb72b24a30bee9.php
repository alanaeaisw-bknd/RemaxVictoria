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
    <link rel="stylesheet" href="<?php echo e(asset('css/style7.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <header>
        <?php echo $__env->make('nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>
    <div class="search">
        <form action="<?php echo e(route('statsglobales')); ?>" method="post" class="buscador" id="#miFormulario">
            <?php echo csrf_field(); ?>
            <select class="form-select form-select-sm" aria-label="Default select example" id="inputt" placeholder="Mes" name="inputt">
                <option selected>Selecciona Fecha</option>
                <?php $__currentLoopData = $diccionario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes => $semanas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $semanas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($mes); ?>/<?php echo e($semana); ?>">
                            <?php echo e($mes); ?> Semana <?php echo e($semana); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <button type="submit" class="lupa-cuad">
                <svg class="lupa" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
            </button>
        </form>
    </div>
    <div class="estadisticas">
        <div class="grafica" <?php if(isset($tipo)): ?> tipo="<?php echo e($tipo); ?>" <?php endif; ?>>
            <div class="cabecera">
                <?php if(isset($llamadas)): ?>
                    <p class="parametro" id="parametro">LLamadas: <?php echo e($llamadas); ?></p>
                <?php else: ?>
                    <p class="parametro">LLamadas: ---</p>
                <?php endif; ?>
                <?php if(isset($contestadas)): ?>
                <p class="parametro">Contestadas: <?php echo e($contestadas); ?></p>
                <?php else: ?>
                <p class="parametro">Contestadas: ---</p>
                <?php endif; ?>
                <?php if(isset($interesados)): ?>
                <p class="parametro">Interesados: <?php echo e($interesados); ?></p>
                <?php else: ?>
                <p class="parametro">Interesados: ---</p>
                <?php endif; ?>
                <?php if(isset($citas)): ?>
                <p class="parametro">Citas: <?php echo e($citas); ?></p>
                <?php else: ?>
                <p class="parametro">Citas: ---</p>
                <?php endif; ?>
                <?php if(isset($semanapuesta)): ?>
                <p class="parametro">Semana: <?php echo e($semanapuesta); ?></p>
                <?php else: ?>
                <p class="parametro">Semana: ---</p>
                <?php endif; ?>
                <?php if(isset($mespuesto)): ?>
                <p class="parametro">Mes: <?php echo e($mespuesto); ?></p>
                <?php else: ?>
                <p class="parametro">Mes: ---</p>
                <?php endif; ?>
            </div>
            <div class="programming-stats">
                <div class="chart-container">
                  <canvas class="my-chart" id="grafica"></canvas>
                </div>
                <div class="details">
                    <?php if(isset($citas2)): ?><h5 id="titulo-ul">FUENTES DE CONTACTO:</h5><?php endif; ?>
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
                    <?php if(isset($tabla)): ?>
                    <?php $__currentLoopData = $tabla; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clave => $valor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($clave); ?></td>
                        <td><?php echo e($valor[0]); ?></td>
                        <td><?php echo e($valor[1]); ?></td>
                        <td>
                            <?php if($valor[0] > 0): ?>
                            <?php echo e(number_format(($valor[1] / $valor[0]) * 100, 2)); ?>%
                            <?php else: ?>
                            0
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="estadisticas" <?php if(isset($citas2)): ?> citas="<?php echo e($citas2); ?>" <?php endif; ?> id="estadisticas">
        <div class="grafica">
            <div class="cabecera">
                <?php if(isset($contactos)): ?>
                    <p class="parametro">CONTACTOS TOTALES: <?php echo e($contactos); ?></p>
                <?php else: ?>
                    <p class="parametro">CONTACTOS TOTALES: ---</p>
                <?php endif; ?>
            </div>
            <div class="programming-stats" id="programming2">
                <div class="chart-container">
                  <canvas class="my-chart" id="grafica2"></canvas>
                </div>
                <div class="details" id="details2">
                    <?php if(isset($citas2)): ?><h5 id="titulo-ul">CITAS TOTALES:</h5><?php endif; ?>
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
                    <?php if(isset($tabla)): ?>
                    <?php $__currentLoopData = $tabla; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clave => $valor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($clave); ?></td>
                        <td><?php echo e($valor[0]); ?></td>
                        <td><?php echo e($valor[1]); ?></td>
                        <td>
                            <?php if($valor[0] > 0): ?>
                            <?php echo e(number_format(($valor[1] / $valor[0]) * 100, 2)); ?>%
                            <?php else: ?>
                            0
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo e(asset('js/nav.js')); ?>"></script>
    <script src="<?php echo e(asset('js/app5.js')); ?>"></script>
</body>
</html><?php /**PATH C:\laragon\www\agenda.remaxvictoria.mx\resources\views/statsglobales.blade.php ENDPATH**/ ?>