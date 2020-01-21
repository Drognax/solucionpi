<?php $__env->startSection('ruta', 'Detalles de la Empresa'); ?>

<?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empresa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
<?php $__env->startSection('www'); ?>


<?php $__env->stopSection(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->startSection('boton'); ?>
<fieldset class="form-group">
    <select class="form-control" id="basicSelect" onchange="location = this.value;">
      <option value="#">Listados</option>
      <option value="<?php echo e(url('/preventivo', $empresa->id)); ?>">Plan Preventivo</option>
      <option value="<?php echo e(url('/trabajadores', $empresa->id)); ?>">Trabajadores</option>
      <option value="<?php echo e(url('/equipamento', $empresa->id)); ?>">Equipamento</option>
      <option value="<?php echo e(url('/instalaciones', $empresa->id)); ?>">Instalaciones</option>
      <option value="<?php echo e(url('/especifica', $empresa->id)); ?>">Doc Especifica</option>
    </select>
</fieldset>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="card-block">
    <div class="card-body ">
        
        
            <!-- Modal -->
            <div class="modal fade" id="exampleModal0" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel0">Editar: <?php echo e($empresa->nombre); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="<?php echo e(URL('empresas/update',$empresa->id)); ?>">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('PUT')); ?>

                    <fieldset class="form-group col-xl-10 col-lg-6 col-md-12"> Nombre:
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo e($empresa->nombre); ?>" >
                    </fieldset>
                    <fieldset class="form-group col-xl-10 col-lg-6 col-md-12"> Rut:
                    <input type="text" class="form-control" id="rut" name="rut" value="<?php echo e($empresa->rut); ?>" >
                    </fieldset>
                    <fieldset class="form-group col-xl-10 col-lg-6 col-md-12"> Giro:
                    <input type="text" class="form-control" id="giro" name="giro" value="<?php echo e($empresa->giro); ?>" >
                    </fieldset>
                    <fieldset class="form-group col-xl-10 col-lg-6 col-md-12"> Representante:
                    <input type="text" class="form-control" id="representante" name="representante" value="<?php echo e($empresa->representante); ?>" >
                    </fieldset>
                    <fieldset class="form-group col-xl-10 col-lg-6 col-md-12"> Contacto:
                    <input type="text" class="form-control" id="contacto" name="contacto" value="<?php echo e($empresa->contacto); ?>" >
                    </fieldset>
                    <fieldset class="form-group col-xl-10 col-lg-6 col-md-12"> Dirección:
                    <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo e($empresa->direccion); ?>" >
                    </fieldset>                    
                    <fieldset class="form-group col-xl-10 col-lg-6 col-md-12"> Cotización:
                    <input type="text" class="form-control" id="cotizacion" name="cotizacion" value="<?php echo e($empresa->cotizacion); ?>" >
                    </fieldset>
                    <fieldset class="form-group col-xl-10 col-lg-6 col-md-12"> Trabajadores:
                    <input type="text" class="form-control" id="trabajadores" name="trabajadores" value="<?php echo e($empresa->trabajadores); ?>" >
                    </fieldset>
                  </div>
                  <div class="modal-footer">   
                    <button type="summit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  </div>
                </form>
                </div>
              </div>
              
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3"><?php echo e($empresa->nombre); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="<?php echo e(URL('empresas/updatedoc',$empresa->id)); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('PUT')); ?>

                    <label for="contrato">Contrato:</label>
                    <input type="file" name="documento" id="documento"><br/>
                    <input type="hidden" name="id" value="<?php echo e($empresa->id); ?>">
                    <input type="hidden" name="contrato" value="<?php echo e($empresa->contrato); ?>">
                  </div>
                  <div class="modal-footer">
                    <button type="summit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  </div>
                    </form>
                </div>
              </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4"><?php echo e($empresa->nombre); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="<?php echo e(URL('empresas/updatecer',$empresa->id)); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('PUT')); ?>

                    <label for="contrato">Certificado:</label>
                    <input type="file" name="documento" id="documento"><br/>
                    <input type="hidden" name="id" value="<?php echo e($empresa->id); ?>">
                    <input type="hidden" name="certificado" value="<?php echo e($empresa->certificado); ?>">
                  </div>
                  <div class="modal-footer">
                    <button type="summit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>
        <fieldset class="form-group col-xl-6 col-lg-6 col-md-12">
        <div class="btn-group mr-1 mb-1">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal0" >Editar</button>
            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            </button>
            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(120px, 39px, 0px); top: 0px; left: 0px; will-change: transform;">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal3">Actualizar contrato</a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal4">Actualizar certificado</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" onclick="return confirm('¿Está seguro de eliminar?')" >Eliminar</a>
                
            </div>          
        </div>
        </fieldset>
    	
        <fieldset class="form-group col-xl-6 col-lg-6 col-md-12"> Nombre:
        <input type="text" class="form-control" id="basicInput" value="<?php echo e($empresa->nombre); ?>" readonly>
    	</fieldset>
    	<fieldset class="form-group col-xl-6 col-lg-6 col-md-12"> Rut:
        <input type="text" class="form-control" id="basicInput" value="<?php echo e($empresa->rut); ?>" readonly>
    	</fieldset>
    	<fieldset class="form-group col-xl-6 col-lg-6 col-md-12"> Giro:
        <input type="text" class="form-control" id="basicInput" value="<?php echo e($empresa->giro); ?>" readonly>
    	</fieldset>
    	<fieldset class="form-group col-xl-6 col-lg-6 col-md-12"> Representante:
        <input type="text" class="form-control" id="basicInput" value="<?php echo e($empresa->representante); ?>" readonly>
    	</fieldset>
    	<fieldset class="form-group col-xl-6 col-lg-6 col-md-12"> Contacto:
        <input type="text" class="form-control" id="basicInput" value="<?php echo e($empresa->contacto); ?>" readonly>
    	</fieldset>
        <fieldset class="form-group col-xl-6 col-lg-6 col-md-12"> Dirección:
        <input type="text" class="form-control" id="basicInput" value="<?php echo e($empresa->direccion); ?>" readonly>
        </fieldset>
        
        <fieldset class="form-group col-xl-6 col-lg-6 col-md-12"> Cotización:
        <input type="text" class="form-control" id="basicInput" value="<?php echo e($empresa->cotizacion); ?>" readonly>
        </fieldset>
        <fieldset class="form-group col-xl-6 col-lg-6 col-md-12"> Trabajadores:
        <input type="text" class="form-control" id="basicInput" value="<?php echo e($empresa->trabajadores); ?>" readonly>
        </fieldset>
        <fieldset class="form-group col-xl-6 col-lg-6 col-md-12">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
              Contrato
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">Contrato de <?php echo e($empresa->nombre); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <embed src="<?php echo e(asset("storage/$empresa->contrato")); ?>" type="application/pdf" width="100%" height="500px" />
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
            Certificado
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Certificado de <?php echo e($empresa->nombre); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <embed src="<?php echo e(asset("storage/$empresa->certificado")); ?>" type="application/pdf"  width="100%"  height="500px" />
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
        </fieldset>
        <fieldset class="form-group col-xl-6 col-lg-6 col-md-12">
    	<a href="<?php echo e(url('/empresas')); ?>"><button type="button" class="btn btn-light btn-min-width mr-1 mb-1">Volver</button></a>
        </fieldset>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\enlace\resources\views/company/show.blade.php ENDPATH**/ ?>