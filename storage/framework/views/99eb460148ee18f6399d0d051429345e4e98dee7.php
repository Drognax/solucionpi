<?php $__env->startSection('ruta', 'Trabajadores de '.$first->nombre); ?>


<?php $__env->startSection('www'); ?>

<a href="<?php echo e(url('/empresas',$first->id)); ?>" >Empresa </a>
/
<?php $__env->stopSection(); ?>

<?php $__env->startSection('boton'); ?>
<a href="<?php echo e(url('/trabajadores/create', $last->id)); ?>">Nuevo Trabajador </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="card-header">
	<h4 class="card-title">Registro de Trabajadores</h4>
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
				<th>Nombre</th>
				<th>Rut</th>
				<th>Cargo</th>
				<th>Actividades</th>
				<th></th>
				<th>Acción</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php $__empty_1 = true; $__currentLoopData = $worker; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trabajador): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
				<tr>
					<td onclick="window.location='<?php echo e(url('/trabajadores/show/'.$trabajador->id.'/')); ?>';"><?php echo e($trabajador->nombre); ?></td>
					<td><?php echo e($trabajador->rut); ?></td>
					<td><?php echo e($trabajador->cargo); ?></td>
					<td><?php echo e($trabajador->actividades); ?></td>
					<td></td>
					
					<td>
	                    <form method="POST" action="<?php echo e(URL('/trabajadores/delworker')); ?>" id="eliminar">
	                        <?php echo e(csrf_field()); ?>

	                        <?php echo e(method_field('PUT')); ?>

	                    <input type="hidden" id="id" name="id" value="<?php echo e($trabajador->id); ?>">
	                    <input type="hidden" id="act" name="empresa" value="<?php echo e($trabajador->empresa_id); ?>">
	                    <button type="submit" class="btn btn-icon btn-danger" onclick="return confirm('¿Está seguro de eliminar?')"><i class="la la-trash-o"></i></button> 
	                    </form>
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
				<div class="alert alert-danger">
				<li>No hay trabajadores registrados.</li>
				</div>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\enlace\resources\views/workers/list.blade.php ENDPATH**/ ?>