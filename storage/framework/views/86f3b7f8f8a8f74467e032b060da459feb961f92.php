<?php $__env->startSection('ruta', 'Empresas del Sistema'); ?>


<?php $__env->startSection('boton'); ?>
<a href="<?php echo e(url('empresas/create')); ?>"> Nueva Empresa </a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="card-header">
	<h4 class="card-title">Registro de Empresas</h4>
	<a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
	<div class="heading-elements">
		<ul class="list-inline mb-0">
			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar"> <!-- buscador -->
			<li><a data-action="collapse"><i class="ft-minus"></i></a></li>		
			<li><a data-action="expand"><i class="ft-maximize"></i></a></li>

			
		</ul>
	</div>
</div>
<div class="card-content collapse show" >
	<div class="table-responsive">
		<table id="tablet" class="table table-hover table-fixed table-bordered table-sm">			
			<thead class="thead-dark"> <!-- class=cabecera blaca o negra -->
				<tr>
				<th>Nombre</th>
				<th>Rut</th>
				<th>Giro</th>
				<th>Representante</th>
				<th>Contacto</th>
				<th>Dirección</th>
				<th>Trabajadores</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php $__empty_1 = true; $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $empresa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
				<tr onclick="window.location='<?php echo e(url('/empresas/'.$empresa->id.'/')); ?>';" >
					<td><?php echo e($empresa->nombre); ?></td>
					<td><?php echo e($empresa->rut); ?></td>
					<td><?php echo e($empresa->giro); ?></td>
					<td><?php echo e($empresa->representante); ?></td>
					<td><?php echo e($empresa->contacto); ?></td>
					<td><?php echo e($empresa->direccion); ?></td>
					<td><?php echo e($empresa->trabajadores); ?></td></a>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
				<div class="alert alert-danger">
				<li>No hay Empresas registradas.</li>
			</div>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\enlace\resources\views/company/empresa.blade.php ENDPATH**/ ?>