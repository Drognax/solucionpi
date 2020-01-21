<?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->startSection('ruta', 'Perfil de '.$usuario->nombre); ?>



<?php $__env->startSection('content'); ?>

<?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="card-block">
    <div class="card-body ">
        <fieldset class="form-group col-xl-6 col-lg-6 col-md-12">
        <div class="btn-group mr-1 mb-1">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal0" >Editar</button>
            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            </button>
            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(120px, 39px, 0px); top: 0px; left: 0px; will-change: transform;">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#Modalpass">Nueva Contraseña</a>
                
            </div>          
        </div>
        </fieldset>
        <!-- Modal -->
             <div class="modal fade" id="exampleModal0" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel0">Editar: <?php echo e($usuario->nombre); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="<?php echo e(URL('usuarios/update',$usuario->id)); ?>">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('PUT')); ?>

                    <fieldset class="form-group col-xl-6 col-lg-6 col-md-12"> Nombres:
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo e($usuario->nombre); ?>" >
                    </fieldset>
                    <fieldset class="form-group col-xl-6 col-lg-6 col-md-12"> Apellidos:
                    <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo e($usuario->apellido); ?>" >
                    </fieldset>
                    <fieldset class="form-group col-xl-6 col-lg-6 col-md-12"> Correo:
                    <input type="text" class="form-control" name="email" id="email" value="<?php echo e($usuario->email); ?>" >
                    </fieldset>
                    <input type="hidden" class="form-control" name="cargo" id="cargo" value="<?php echo e($usuario->cargo); ?>" readonly>
                    <input type="hidden" class="form-control" name="empresa" id="empresa" value="<?php echo e($usuario->empresa_id); ?>" readonly>
                  </div>
                  <div class="modal-footer">   
                    <button type="summit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  </div>
                </form>
                </div>
              </div>              
            </div>



        <fieldset class="form-group col-xl-6 col-lg-6 col-md-12"> Nombres:
        <input type="text" class="form-control" id="basicInput" value="<?php echo e($usuario->nombre); ?>" readonly>
    	</fieldset>
    	<fieldset class="form-group col-xl-6 col-lg-6 col-md-12"> Apellidos:
        <input type="text" class="form-control" id="basicInput" value="<?php echo e($usuario->apellido); ?>" readonly>
    	</fieldset>
    	<fieldset class="form-group col-xl-6 col-lg-6 col-md-12"> Correo:
        <input type="text" class="form-control" id="basicInput" value="<?php echo e($usuario->email); ?>" readonly>
    	</fieldset>
    	<fieldset class="form-group col-xl-6 col-lg-6 col-md-12"> Cargo:
        <input type="text" class="form-control" id="basicInput" value="<?php echo e($usuario->cargo); ?>" readonly>
    	</fieldset>
    	<fieldset class="form-group col-xl-6 col-lg-6 col-md-12"> Empresa:
        <input type="text" class="form-control" id="basicInput" value="<?php echo e($usuario->empresa_id); ?>" readonly>
    	</fieldset>
    </div>
</div>

            <!-- Modal -->
            <div class="modal fade" id="Modalpass" tabindex="-1" role="dialog" aria-labelledby="Modalpass" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Nueva Contraseña de <?php echo e($usuario->nombre); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="<?php echo e(URL('usuarios/password',$usuario->id)); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('PUT')); ?>

                    <fieldset class="form-group col-xl-6 col-lg-6 col-md-12">Contraseña:
                    <input type="password" class="form-control" name="password" id="password" placeholder="Mayor a 6 caracteres" required="required">
                    </fieldset>
                    <input type="hidden" name="id" value="<?php echo e($usuario->id); ?>">
                  </div>
                  <div class="modal-footer">
                    <button type="summit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>

            
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\enlace\resources\views/users/perfil.blade.php ENDPATH**/ ?>