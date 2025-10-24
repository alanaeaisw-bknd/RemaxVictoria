<?php
use App\Models\FuenteContacto;
$fuentes_contacto = FuenteContacto::all();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Circulo Influencia</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style4.css')); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    
</head>
<style>
    #example th.center,
    #example td.center {
        text-align: center;
    }
    #example thead input {
            width: 100%;
            box-sizing: border-box;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        /* Estilo para los cuadros de búsqueda en las columnas */
        #example_wrapper .dataTables_filter input {
            width: 100%;
            box-sizing: border-box;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Estilo para reducir el ancho de las filas de la tabla */
        

        /* Ocultar el filtro general y la sección "Show" */
        #example_wrapper .dataTables_length,
        #example_wrapper .dataTables_info,
        #example_wrapper .dataTables_filter {
            display: none;
        }

        /* Ocultar la navegación "Previous" y "Next" */
        #example_wrapper .dataTables_paginate {
            display: none;
        }
    </style>
<body>
    <header>
        <?php echo $__env->make('nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </header>
    <?php if($permiso == "limited"): ?>
    <button type="button" class="btn btn-success" id="btn_agregar" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <img src="<?php echo e(asset('images\agregar.png')); ?>" alt="" id="suma">
    </button>
    <?php endif; ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content" id="modal">
          <div class="modal-header" style="position: sticky; top: 0; background-color: white; z-index: 1000;">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Registro</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(url('contactos/store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="Nombre" class="form-label">Nombre Completo:</label>
                            <input type="text" class="form-control" name="nombre" placeholder="" required pattern="[A-Za-z ]+">
                            <small class="form-text text-muted">Ingrese solo caracteres alfabéticos y espacios.</small>
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Telefono:</label>
                            <input type="text" name="telefono" class="form-control" placeholder="" nullable required pattern="\d*">
                            <small class="form-text text-muted">Ingrese solo caracteres numéricos.</small>
                        </div>

                        
                        <div class="mb-3">
                            <label for="Correo" class="form-label">Correo:</label>
                            <input type="email" name="correo" class="form-control" placeholder="" nullable>
                        </div>
                        <div class="mb-3">
                            <label for="fuente_contacto_id" class="form-label">Fuente de Contacto:</label>
                            <select name="fuente_contacto_id" class="form-select">
                                <?php $__currentLoopData = $fuentes_contacto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fuente_contacto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($fuente_contacto->id); ?>"><?php echo e($fuente_contacto->nombre_fuente); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="posible" class="form-label">Posible:</label>
                            <select id="posible" name="posible" class="form-select" required>
                                <option text="opcion3">---</option>
                                <option text="Comprador">Comprador</option>
                                <option text="Vendedor">Vendedor</option>
                                <option text="Arrendador">Arrendador</option>
                                <option text="Arrendatario">Arrendatario</option>
                                <option text="Referido">Referido</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="clasificacion" class="form-label">Clasificación:</label>  
                            <select id="clasificacion" name="clasificacion" class="form-select" nullable>
                                <option value="opcion1">---</option>
                                <option text="A">A</option>
                                <option text="B">B</option>
                                <option text="C">C</option>
                                <option text="D">D</option>
                            </select>
                        </div>

                       

                        <div class="mb-3">
                            <label for="clave_sir" class="form-label">CLAVE SIR:</label>
                            <input type="text" class="form-control" name="clave_sir" placeholder="" nullable>
                        </div>

                        <div class="mb-3">
                            <label for="FOVISSSTE" class="form-label">FOVISSSTE:</label>
                            <select class="form-select" name="fovissste" required>
                                <option value="opcion1">---</option>
                                <option value="1">Verdadero</option>
                                <option value="0">Falso</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="infonavit" class="form-label">Infonavit:</label>
                            <select class="form-select" name="infonavit" required>
                                <option value="opcion1">---</option>
                                <option value="1">Verdadero</option>
                                <option value="0">Falso</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="bancario" class="form-label">Bancario:</label>
                            <select class="form-select" name="bancario" required>
                                <option value="opcion1">---</option>
                                <option value="1">Verdadero</option>
                                <option value="0">Falso</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="comentario" class="form-label">Comentario:</label>
                            <textarea class="form-control" name="comentario" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="valor" class="form-label">Valor:</label>
                            <input type="text" class="form-control" name="valor" placeholder="" pattern="\d*">
                            <small class="form-text text-muted">Ingrese solo caracteres numéricos.</small>
                        </div>

                        <div class="mb-3">
                            <label for="semana" class="form-label">Semana:</label>
                            <select class="form-select" name="semana">
                                <option value="opcion1">---</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="mes" class="form-label">Mes:</label>
                            <select class="form-select" name="mes">
                                <option value="opcion1">---</option>
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
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    <div class="contenedor">
    <table id="example">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Fuente de contacto</th>
                <th>Posible</th>
                <th>Clasificación</th>
                <th>Llamada</th>
                <th>Contestada</th>
                <th>Interesado</th>
                <th>Cita</th>
                <th>Clave SIR</th>
                <th>Fovissste</th>
                <th>Infonavit</th>
                <th>Bancario</th>
                <th>Comentario</th>
                <th>Valor</th>
                <th>Semana</th>
                <th>Mes</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $contactos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contacto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="text-center">
                    <div data-contacto="<?php echo e(json_encode($contacto)); ?>" class="editar-contacto"> <?php echo e($contacto->nombre); ?></div>
                    </td>
                    <td class="text-center">
                    <div data-contacto="<?php echo e(json_encode($contacto)); ?>" class="editar-contacto"> <?php echo e($contacto->telefono); ?></div>
                    </td>
                    <td class="text-center">
                    <div data-contacto="<?php echo e(json_encode($contacto)); ?>" class="editar-contacto"> <?php echo e($contacto->correo); ?></div>
                    </td>
                    <td class="text-center">
                    <div data-contacto="<?php echo e(json_encode($contacto)); ?>" class="editar-contacto"> <?php echo e($contacto->fuenteContacto['nombre_fuente']); ?></div>
                    </td>
                    <td class="text-center">
                    <div data-contacto="<?php echo e(json_encode($contacto)); ?>" class="editar-contacto"> <?php echo e($contacto->posible); ?></div>
                    </td>
                    <td class="text-center">
                    <div data-contacto="<?php echo e(json_encode($contacto)); ?>" class="editar-contacto"> <?php echo e($contacto->clasificacion); ?></div>
                    </td>

                    <td class="text-center">
                    <input
                        type="checkbox"
                        class="checkbox-actualizar"
                        data-id="<?php echo e($contacto->id); ?>"
                        data-campo="llamada"
                        <?php echo e($contacto->llamada ? 'checked' : ''); ?>

                    >
                    </td>
                    <td class="text-center">
                    <input
                        type="checkbox"
                        class="checkbox-actualizar"
                        data-id="<?php echo e($contacto->id); ?>"
                        data-campo="contestada"
                        <?php echo e($contacto->contestada ? 'checked' : ''); ?>

                    >
                    </td>
                    <td class="text-center">
                    <input
                        type="checkbox"
                        class="checkbox-actualizar"
                        data-id="<?php echo e($contacto->id); ?>"
                        data-campo="interesado"
                        <?php echo e($contacto->interesado ? 'checked' : ''); ?>

                    >
                    </td>
                    <td class="text-center">
                    <input
                        type="checkbox"
                        class="checkbox-actualizar"
                        data-id="<?php echo e($contacto->id); ?>"
                        data-campo="cita"
                        <?php echo e($contacto->cita ? 'checked' : ''); ?>

                    >
                    </td>
                    <td class="text-center">
                    <div data-contacto="<?php echo e(json_encode($contacto)); ?>" class="editar-contacto"> <?php echo e($contacto->clave_sir); ?></div>
                    </td><td class="text-center">
                    <div data-contacto="<?php echo e(json_encode($contacto)); ?>" class="editar-contacto"> <?php echo e($contacto->fovissste ? 'Verdadero' : 'Falso'); ?></div>
                    </td><td class="text-center">
                    <div data-contacto="<?php echo e(json_encode($contacto)); ?>" class="editar-contacto"> <?php echo e($contacto->infonavit ? 'Verdadero' : 'Falso'); ?></div>
                    </td><td class="text-center">
                    <div data-contacto="<?php echo e(json_encode($contacto)); ?>" class="editar-contacto"> <?php echo e($contacto->bancario ? 'Verdadero' : 'Falso'); ?></div>
                    </td><td class="text-center">
                    <div data-contacto="<?php echo e(json_encode($contacto)); ?>" class="editar-contacto"> <?php echo e($contacto->comentario); ?></div>
                    </td><td class="text-center">
    <div data-contacto="<?php echo e(json_encode($contacto)); ?>" class="editar-contacto">
        <?php echo e(number_format($contacto->valor, 2, ',', '.')); ?> 
    </div>
</td>

                    </td><td class="text-center">
                    <div data-contacto="<?php echo e(json_encode($contacto)); ?>" class="editar-contacto"> <?php echo e($contacto->semana); ?></div>
                    </td><td class="text-center">
                    <div data-contacto="<?php echo e(json_encode($contacto)); ?>" class="editar-contacto"> <?php echo e($contacto->mes); ?></div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    </div>
                

   
<<!-- Modal para editar-->
<div class="modal fade" id="modalEditarContacto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<style>
    .custom-modal {
        max-width: 40%; /* Ancho máximo personalizado */
        width: 800px; /* Ancho fijo personalizado */
        max-height: 80vh; /* Altura máxima personalizada en relación con la altura del viewport */
        height: 400px; /* Altura fija personalizada */
    }
</style>

<div class="modal-dialog custom-modal">
        <div class="modal-content" id="modalEditarContacto1">
        <div class="modal-header" style="position: sticky; top: 0; background-color: white; z-index: 1000;">
            <h5 class="modal-title" id="exampleModalLabel">Editar Contacto</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="max-height: 400px; overflow-y: auto;">

                <form id="formEditarContacto" method="POST" action="<?php echo e(route('contacto.update', ['id' => '__ID__'])); ?>">
                    <?php echo method_field('PATCH'); ?>
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="edit_user_id" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                    <input type="hidden" id="edit_contacto_id" name="id">
                    
                       
                        <input type="hidden" name="llamada" value="0">
                        <input type="hidden" name="llamada" id="edit_llamada" value="1">
                       
                        <input type="hidden" name="contestada" value="0">
                        <input type="hidden" name="contestada" id="edit_contestada" value="1">
                        
                        <input type="hidden" name="interesado" value="0">
                        <input type="hidden" name="interesado" id="edit_interesado" value="1">
                       
                        <input type="hidden" name="cita" value="0">
                        <input type="hidden" name="cita" id="edit_cita" value="1">
                   
                    <div class="mb-3">
                        <label for="edit_nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="edit_nombre" name="nombre">
                    </div>
                    <div class="mb-3">
                        <label for="edit_telefono" class="form-label">Teléfono:</label>
                        <input type="text" class="form-control" id="edit_telefono" name="telefono">
                    </div>
                    <div class="mb-3">
                        <label for="edit_correo" class="form-label">Correo:</label>
                        <input type="email" class="form-control" id="edit_correo" name="correo">
                    </div>
                    <div class="mb-3">
                         <label for="edit_fuente_contacto" class="form-label">Fuente de Contacto:</label>
                            <select class="form-select" id="edit_fuente_contacto" name="fuente_contacto_id">
                            <?php $__currentLoopData = $fuentes_contacto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fuente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($fuente->id); ?>"><?php echo e($fuente->nombre_fuente); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_posible" class="form-label">Posible:</label>
                        <select class="form-select" id="edit_posible" name="posible">
                            <option value="Comprador">Comprador</option>
                            <option value="Vendedor">Vendedor</option>
                            <option value="Arrendador">Arrendador</option>
                            <option value="Arrendatario">Arrendatario</option>
                            <option value="Referido">Referido</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_clasificacion" class="form-label">Clasificación:</label>
                        <select class="form-select" id="edit_clasificacion" name="clasificacion">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div> 
                    
                    <div class="mb-3">
                        <label for="edit_clave_sir" class="form-label">CLAVE SIR:</label>
                        <input type="text" class="form-control" id="edit_clave_sir" name="clave_sir">
                    </div>

                    <div class="mb-3">
                        <label for="edit_fovissste" class="form-label">Fovissste:</label>
                        <select class="form-select" name="fovissste" id="edit_fovissste">
                            <option value="1" id="edit_fovissste_si">Verdadero</option>
                            <option value="0" id="edit_fovissste_no">Falso</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="edit_infonavit" class="form-label">Infonavit:</label>
                        <select class="form-select" name="infonavit" id="edit_infonavit">
                            <option value="1" id="edit_infonavit_si">Verdadero</option>
                            <option value="0" id="edit_infonavit_no">Falso</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="edit_bancario" class="form-label">Bancario:</label>
                        <select class="form-select" name="bancario" id="edit_bancario">
                            <option value="1" id="edit_bancario_si">Verdadero</option>
                            <option value="0" id="edit_bancario_no">Falso</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="edit_comentario" class="form-label">Comentario:</label>
                        <textarea class="form-control" id="edit_comentario" name="comentario" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_valor" class="form-label">Valor:</label>
                        <input type="text" class="form-control" id="edit_valor" name="valor">
                    </div>
                    <div class="mb-3">
                        <label for="edit_semana" class="form-label">Semana:</label>
                        <select class="form-select" id="edit_semana" name="semana">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_mes" class="form-label">Mes:</label>
                        <select class="form-select" id="edit_mes" name="mes">
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
            </div>
            <div class="modal-footer">
                <?php if($permiso == "limited"): ?>
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <button type="button" class="btn btn-danger" id="btnEliminarContacto">Eliminar</button>
                <?php endif; ?>
            </div>
        </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var checkboxes = document.querySelectorAll('.checkbox-actualizar');

        checkboxes.forEach(function (checkbox) {
            checkbox.addEventListener('change', function () {
                var id = checkbox.getAttribute('data-id');
                var campo = checkbox.getAttribute('data-campo');
                var valor = checkbox.checked ? 1 : 0;

                // Envia una solicitud AJAX para actualizar el checkbox en el servidor
                axios.patch(`/actualizar-checkbox/${id}`, {
                    campo: campo,
                    valor: valor
                })
                .then(function (response) {
                    console.log(response.data);
                    // Puedes realizar acciones adicionales después de una actualización exitosa
                })
                .catch(function (error) {
                    console.error(error);
                });
            });
        });
    });
</script>

<script>
   document.addEventListener('DOMContentLoaded', function () {
    var botonesEditarContacto = document.querySelectorAll('.editar-contacto');

    botonesEditarContacto.forEach(function (boton) {
        boton.addEventListener('click', function () {
            var contacto = JSON.parse(boton.getAttribute('data-contacto'));

            // Llenar los campos en el formulario con los datos del contacto
            document.getElementById('edit_contacto_id').value = contacto.id;
            document.getElementById('edit_nombre').value = contacto.nombre;
            document.getElementById('edit_telefono').value = contacto.telefono;
            document.getElementById('edit_correo').value = contacto.correo;

            // Seleccionar la fuente de contacto actual
            var fuenteContactoSelect = document.getElementById('edit_fuente_contacto');
            for (var i = 0; i < fuenteContactoSelect.options.length; i++) {
                if (fuenteContactoSelect.options[i].value == contacto.fuente_contacto_id) {
                    fuenteContactoSelect.options[i].selected = true;
                }
            }

            // Seleccionar la opción de "posible" actual
            document.getElementById('edit_posible').value = contacto.posible;

            // Seleccionar la opción de "clasificación" actual
            document.getElementById('edit_clasificacion').value = contacto.clasificacion;

            // Seleccionar la opción de "contestada" actual
            document.getElementById('edit_llamada').checked = contacto.llamada;
            document.getElementById('edit_contestada').checked = contacto.contestada;
            document.getElementById('edit_interesado').checked = contacto.interesado;
            document.getElementById('edit_cita').checked = contacto.cita;
            document.getElementById('edit_clave_sir').value = contacto.clave_sir;

            document.getElementById('edit_fovissste').value = contacto.fovissste.toString();
            document.getElementById('edit_infonavit').value = contacto.infonavit.toString();
            document.getElementById('edit_bancario').value = contacto.bancario.toString();


            // Llenar el área de texto con el comentario actual
            document.getElementById('edit_comentario').value = contacto.comentario;

            // Llenar el campo "valor" con el valor actual
            document.getElementById('edit_valor').value = contacto.valor;

            // Seleccionar la opción de "semana" actual
            document.getElementById('edit_semana').value = contacto.semana;

            // Seleccionar la opción de "mes" actual
            document.getElementById('edit_mes').value = contacto.mes;

            // Actualizar la acción del formulario con el ID del contacto
            document.getElementById('formEditarContacto').action = '<?php echo e(url('contacto')); ?>/' + contacto.id;

            // Abrir el modal de edición
            var modalEditarContacto = new bootstrap.Modal(document.getElementById('modalEditarContacto'));
            modalEditarContacto.show();
        });
    });
});

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var btnEliminarContacto = document.getElementById('btnEliminarContacto');

        btnEliminarContacto.addEventListener('click', function () {
            // Mostrar confirmación antes de eliminar
            var confirmacion = confirm('¿Estás seguro de que deseas eliminar este contacto?');
            
            if (confirmacion) {
                // Obtener el ID del contacto a eliminar
                var contactoId = document.getElementById('edit_contacto_id').value;

                // Enviar la solicitud de eliminación al controlador
                window.location.href = '<?php echo e(url('contacto')); ?>/' + contactoId + '/eliminar';
            }
        });
    });
</script>
<script src="<?php echo e(asset('js/nav.js')); ?>"></script>
   
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script> 

<script>
$(document).ready(function(){
    var table = $('#example').DataTable({
        orderCellsTop: true,
        fixedHeader: true, 
        paging: false
    });

    // Creamos una fila en el head de la tabla y lo clonamos para cada columna
    $('#example thead tr').clone(true).appendTo('#example thead');


    $('#example thead tr:eq(1) th').each(function (i) {
        var title = $(this).text(); // es el nombre de la columna
        if (title !== 'Llamada' && title !== 'Contestada' && title !== 'Interesado' && title !== 'Cita') {
            $(this).html('<input type="text" placeholder="Search... " />');

            $('input', this).on('keyup change', function () {
                if (table.column(i).search() !== this.value) {
                    table.column(i).search(this.value).draw();
                }
            });
        } else {
            $(this).html('');
        }
    });
});
</script>


</body>
</html><?php /**PATH C:\laragon\www\RemaxVictoria\resources\views/circuloinf.blade.php ENDPATH**/ ?>