<?php $__env->startSection('ruta', 'Documentación Especifica de '.$first->nombre); ?>


<?php $__env->startSection('content'); ?>

<?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="card-header">
	<h4 class="card-title">Documentos</h4>
	<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
	<div class="heading-elements">
		<ul class="list-inline mb-0">
			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar">
			<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
			<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
		</ul>
	</div>
</div>
<div class="card-content collapse show">
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<thead class="thead-dark"> <!-- class=cabecera blaca o negra -->
				<tr>
				<th>Nombre</th>
				<th>Documentación</th>
				<th>Indicador</th>
				<th>Observaciones</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php $__empty_1 = true; $__currentLoopData = $especifico; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
				<tr data-toggle="collapse" data-target=".order<?php echo e($loop->index); ?>">
					<?php $count= $loop->index ?>
					<td><b><?php echo e($doc->nombre); ?></b></td>
					<td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo e($loop->index); ?>">
                Ver Documento
          </button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal<?php echo e($loop->index); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel<?php echo e($loop->index); ?>"><?php echo e($doc->nombre); ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <embed src="<?php echo e(asset("storage/$doc->actividad")); ?>" type="application/pdf" width="100%" height="500px" />
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div></td>
            <?php 
            $segundosFechaActual = strtotime($doc->indicador);
            $segundosFechaRegistro = strtotime($fecha);
            $segundosrestantes = $segundosFechaActual - $segundosFechaRegistro;
            $segundosrestantes = $segundosrestantes/ 86400; 
            ?>                                   
              <td>
                  <?php if($segundosrestantes < "0"): ?>
                      <button type="button" class="btn btn-danger ">Vencido</i></button>

                  <?php elseif($segundosrestantes == "0"): ?>
                      <button type="button" class="btn btn-danger "></i><?php echo $segundosrestantes; ?> Días restantes</button>

                  <?php elseif($segundosrestantes < 29): ?>
                      <button type="button" class="btn btn-warning"></i><?php echo $segundosrestantes; ?> Días restantes</button>

                  <?php elseif($segundosrestantes >= 30): ?>
                      <button type="button" class="btn btn-success"></i><?php echo $segundosrestantes; ?></button>
                  <?php endif; ?>
              </td>
					<td><?php echo e($doc->observaciones); ?></td>					
						</td>
						</tr>      
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
				<div class="alert alert-danger">
				<li>No hay documentos.</li>
				</div>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>


<div class="modal fade" id="modalItem" tabindex="-1" role="dialog" aria-labelledby="modalItem" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalItem">Nuevo Documento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form method="POST" action="<?php echo e(URL('/especifica/')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

             <?php echo e(method_field('PUT')); ?>

            <fieldset class="form-group col-xl-4 col-lg-6 col-md-12">Nombre:
            <input type="text" class="form-control"  class="form-control" name="name" id="name" required>  
            </fieldset>
            <fieldset class="form-group col-xl-4 col-lg-6 col-md-12">Vigencia del documento:</label>
            <input type="date" class="form-control" name="indicador" id="indicador" required><br/>
            </fieldset>
            </fieldset>
            <fieldset class="form-group col-xl-4 col-lg-6 col-md-12">Observaciones:</label>
            <input type="text" class="form-control" name="observaciones" id="observaciones" ><br/>
            
            </fieldset>  
            <fieldset class="form-group col-xl-4 col-lg-6 col-md-12">Documento:</label>
            <input type="file" name="docs" id="docs" required><br/>
            </fieldset>   
            <input type="hidden" name="dato" value="<?php echo e($first->id); ?>">              
          </div>
          <div class="modal-footer">   
            <button type="summit" class="btn btn-success">Guardar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\enlace\resources\views/dashboard/dashspecific.blade.php ENDPATH**/ ?>