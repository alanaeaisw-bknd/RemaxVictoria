<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style3.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <header>
        <?php echo $__env->make('nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>
    <div class="todo">
      <div class="botonson" id="toggleButton2">
        >
      </div>
      <div id="toggleButton"></div>
      <div class="listas">
        <div id="dashboard" class="">
          <div id="hideButton"><</div>
          <hr>
          <h3>AGENDAS</h3>
          <hr>
          <div class="actcuad">
            <div class="accordion" id="accordionExample">
              <?php $__currentLoopData = $diccionario; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ano => $meses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($ano); ?>" aria-expanded="true" aria-controls="collapseOne">
                    <?php echo e($ano); ?>

                  </button>
                </h2>
                <div id="collapse<?php echo e($ano); ?>" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body" id="accordion-body">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                      <?php $__currentLoopData = $meses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes => $semanas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" id="boton-acordion-2" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse<?php echo e($mes); ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                              <?php echo e($mes); ?>

                            </button>
                        </h2>
                        <div id="flush-collapse<?php echo e($mes); ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                          <div class="list-group">
                            <?php $__currentLoopData = $semanas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semana): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($permiso == 'limited'): ?>
                            <a href="<?php echo e(url("/agenda/{$ano}/{$mes}/{$semana}")); ?>" class="list-group-item list-group-item-action" id="boton-semana">SEMANA <?php echo e($semana); ?></a>
                            <?php endif; ?>
                            <?php if($permiso == 'full'): ?>
                            <a href="<?php echo e(url("/agenda/{$ano}/{$mes}/{$semana}/{$id}")); ?>" class="list-group-item list-group-item-action" id="boton-semana">SEMANA <?php echo e($semana); ?></a>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>
                        </div>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
          <?php if($permiso == 'full'): ?>
          <a href="<?php echo e(url("/actividadesAdmin/{$id}")); ?>" type="button" class="btn btn-primary ag" id="new2">
            Ver Actividades
          </a>
          <?php endif; ?>
          <?php if($permiso == 'limited'): ?>
          <button type="button" class="btn btn-primary ag" id="new">
            Nueva Agenda
          </button>
          <?php endif; ?>
        </div>
        <div id="content">
          <!-- Contenido principal -->
        </div> 
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
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('js/nav.js')); ?>"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.getElementById("new").addEventListener("click", function() {
            window.location.href = "<?php echo e(route('actividades')); ?>";
        });
    </script>
</body>
</html><?php /**PATH C:\laragon\www\RemaxVictoria\resources\views/agenda.blade.php ENDPATH**/ ?>