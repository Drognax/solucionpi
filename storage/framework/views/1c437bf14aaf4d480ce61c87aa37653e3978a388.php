<?php $__env->startSection('ruta', 'Gestión Preventiva de '.$first->nombre); ?>


<?php $__env->startSection('content'); ?>

<?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="card-header">
	<h4 class="card-title">Plan Preventivo</h4>
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
		<table id="tablet" class="table table-hover table-fixed table-bordered table-sm">
			<thead class="thead-dark"> <!-- class=cabecera blaca o negra -->
				<tr>
        <th></th>
				<th>Aspecto</th>
				<th>Estado de Gestión</th>
				<th>Documentación</th>
				<th>Indicador</th>
				<th>Observaciones</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php $__empty_1 = true; $__currentLoopData = $preventive; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
				<tr >
					<?php $count= $loop->index ?>
          <td data-toggle="collapse" data-target=".order<?php echo e($loop->index); ?>">
          <button type="button" class="btn btn-icon btn-dark btn-sm"><i class="la la-plus"></i></button>
          </td>
					<td><b><?php echo e($plan->nombre); ?></b></td>
					<td>
					
                    <?php if($plan->estadoGestion == "na"): ?>
                        <button type="button" class="btn btn-light -btn-sm"><i class="la la-times"></i> No Aplica</button>

                    <?php elseif($plan->estadoGestion == "norealizado"): ?>
                        <button type="button" class="btn btn-danger btn-sm"><i class="la la-frown-o"></i> No Realizado</button>

                    <?php elseif($plan->estadoGestion == "realizado"): ?>
                        <button type="button" class="btn btn-success btn-sm"><i class="la la-flag-checkered"></i> Realizado</button>

                    <?php elseif($plan->estadoGestion == "proceso"): ?>
                        <button type="button" class="btn btn-warning btn-sm"><i class="la la-cogs"></i> En Proceso</button>
                    <?php endif; ?>

					</td>
					<td></td>
					<td></td>
					<td><?php echo e($plan->observaciones); ?></td>					
				</tr>			    	
			    		<?php $__currentLoopData = $aspecto; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    		<?php if($row->planPreventivo_id == $plan->id): ?>
			    		<tr class="collapse order<?php echo e($count); ?> warning">
                <td></td>
			          	<td><?php echo e($row->nombre); ?></td>
			          	<td></td>
			          	<td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo e($loop->index); ?>">
                          Ver Documento
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo e($loop->index); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel<?php echo e($loop->index); ?>"><?php echo e($row->nombre); ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <embed src="<?php echo e(asset("storage/$row->documento")); ?>" type="application/pdf" width="770px" height="500px" />
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div></td>
			          	<?php 
                    $segundosFechaActual = strtotime($row->indicador);
                    $segundosFechaRegistro = strtotime($fecha);
                    $segundosrestantes = $segundosFechaActual - $segundosFechaRegistro;
                    $segundosrestantes = $segundosrestantes/ 86400; ?>
                    

                  
                    <td>
                        <?php if($segundosrestantes < "0"): ?>
                            <button type="button" class="btn btn-danger btn-sm">Vencido</i></button>

                        <?php elseif($segundosrestantes == "0"): ?>
                            <button type="button" class="btn btn-danger btn-sm"></i><?php echo $segundosrestantes; ?> Días </button>

                        <?php elseif($segundosrestantes < 29): ?>
                            <button type="button" class="btn btn-warning btn-sm"></i><?php echo $segundosrestantes; ?> Días </button>

                        <?php elseif($segundosrestantes >= 30): ?>
                            <button type="button" class="btn btn-success btn-sm"></i><?php echo $segundosrestantes; ?></button>
                        <?php endif; ?>
                    </td>
			          	<td><?php echo e($row->observaciones); ?></td>
			        
						</tr>
						<?php endif; ?>
			          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
				<div class="alert alert-danger">
				<li>No hay Plan preventivo.</li>
				</div>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\enlace\resources\views/dashboard/dashpreventivo.blade.php ENDPATH**/ ?>