<?php $__env->startSection('ruta', 'Equipamento de '.$first->nombre); ?>


<?php $__env->startSection('www'); ?>

<a href="<?php echo e(url('/empresas',$first->id)); ?>" >Empresa </a>
/
<?php $__env->stopSection(); ?>

<?php $__env->startSection('boton'); ?>
<a href="<?php echo e(url('/equipamento/create', $last->id)); ?>">Nuevo Equipamento </a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="card-header">
	<h4 class="card-title">Registro de Equipamento</h4>
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
				<th>Referencia</th>
				<th>Modelo</th>
				<th>Marca</th>
				<th>Acción</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php $__empty_1 = true; $__currentLoopData = $equip; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $equipo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
				<tr  >
					<td onclick="window.location='<?php echo e(url('/equipamento/show/'.$equipo->id.'/')); ?>';"><?php echo e($equipo->nombre); ?></td>
					<td><?php echo e($equipo->referencia); ?></td>
					<td><?php echo e($equipo->modelo); ?></td>
					<td><?php echo e($equipo->marca); ?></td>			
					<td>	
                           <form method="POST" action="<?php echo e(URL('/equipamento/delequip')); ?>" id="eliminar">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(method_field('PUT')); ?>

                            <input type="hidden" id="id" name="id" value="<?php echo e($equipo->id); ?>">
                            <input type="hidden" id="act" name="empresa" value="<?php echo e($equipo->empresa_id); ?>">
                            <button type="submit" class="btn btn-icon btn-danger" onclick="return confirm('¿Está seguro de eliminar?')"><i class="la la-trash-o"></i></button> 
                            </form>
					</td>
				</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
				<div class="alert alert-danger">
				<li>No hay equipamentos registrados.</li>
				</div>
				<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\enlace\resources\views/equipment/list.blade.php ENDPATH**/ ?>