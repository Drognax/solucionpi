<?php $__env->startSection('ruta', 'Usuarios del Sistema'); ?>

<?php $__env->startSection('www'); ?>
<a href="<?php echo e(url('usuarios/create')); ?>"> Nuevo Usuario </a>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="card-header">
	<h4 class="card-title">Registro de Usuarios</h4>
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
				<th>Apellido</th>
				<th>Cargo</th>
				<th>Correo</th>
				<th>Empresa</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
				<tr onclick="window.location='<?php echo e(url('/usuarios/'.$user->id.'/')); ?>';" >
					<td><?php echo e($user->nombre); ?></td>
					<td><?php echo e($user->apellido); ?></td>
					<td><?php echo e($user->cargo); ?></td>
					<td><?php echo e($user->email); ?></td>
					<td><?php echo e($user->empresa_id); ?></td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
				<div class="alert alert-danger">
				<li>No hay usuarios registrados.</li>
				</div>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\enlace\resources\views/users/usuarios.blade.php ENDPATH**/ ?>