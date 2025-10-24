<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
  <header>
    <?php echo $__env->make('navLogin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </header>
  <div class="center">
    <div class="imagen">
      <img src="<?php echo e(asset('images\globo.png')); ?>" alt="">
    </div>
    <form method="post" action="<?php echo e(route('login')); ?>">
      <?php echo csrf_field(); ?>
      <div class="txt_field">
        <input type="text" name="sir" required>
        <label>Nombre de usuario</label>
      </div>
      <div class="txt_field">
        <input type="password" name="password" required>
        <label>Contraseña</label>
      </div>
      <input type="submit" value="Iniciar Sesion">
      <div class="card-body">                    
    </form>
  </div>
<?php if($errors->any()): ?>
<div id="mi-toast" class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      -<?php echo e($error); ?>

      <br>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>
<?php endif; ?>
<?php if(session('error')): ?>
<div id="mi-toast" class="toast align-items-center text-bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      <?php echo e(session('error')); ?>

    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>
<?php endif; ?>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
  <script>
    var miToast = document.getElementById("mi-toast");
    var toast = new bootstrap.Toast(miToast);
    toast.show();
  </script>
</body>

</html>
<?php /**PATH C:\laragon\www\agenda.remaxvictoria.mx\resources\views/login.blade.php ENDPATH**/ ?>