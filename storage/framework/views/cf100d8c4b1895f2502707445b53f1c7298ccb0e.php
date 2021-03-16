<?php $__env->startSection('title', 'Lista de Proveedores'); ?>
<?php $__env->startSection('page-title', 'Lista de Proveedores'); ?>

<?php $__env->startSection('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/lobibox/Lobibox.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/dropify/css/dropify.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item">Proveedores Desactivados</li>
<li class="breadcrumb-item active">Lista</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<a href="<?php echo e(route('proveedores.index')); ?>"><button type="button" class="btn btn-success">Proveedores Activos</button></a>
				<div class="table-responsive">
					<table id="tabla" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre</th>
								<th>Teléfono</th>
								<th>Tipo</th>
								<th>Estado</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $providers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($num++); ?></td>
								<td><?php echo e($provider->name); ?></td>
								<td><?php echo e($provider->phone); ?></td>
								<td><?php echo userType($provider->type); ?></td>
								<td><?php echo userState($provider->state); ?></td>
								<td class="d-flex">
									<a class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ver Más" href="<?php echo e(route('proveedores.show', ['slug' => $provider->slug])); ?>" ><i class="mdi mdi-account-card-details"></i></a>&nbsp;&nbsp;
									<a class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar" href="<?php echo e(route('proveedores.edit', ['slug' => $provider->slug])); ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
									<?php if($provider->state==0): ?>
									<button class="btn btn-success btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Activar" onclick="activateProvider('<?php echo e($provider->slug); ?>')"><i class="fa fa-check"></i></button>
									<?php else: ?>
									<button class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Desactivar" onclick="deactivateProvider('<?php echo e($provider->slug); ?>')"><i class="fa fa-history"></i></button>
									<?php endif; ?>
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>




<div class="modal fade" id="activateProvider" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres activar este proveedor?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<form action="#" method="POST" id="formActivateProvider">
					<?php echo csrf_field(); ?>
					<?php echo method_field('PUT'); ?>
					<button type="submit" class="btn btn-primary">Activar</button>
				</form>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('/admins/vendors/lobibox/Lobibox.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/dropify/js/dropify.min.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/datatables/jquery.dataTables.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\losFranceses\resources\views/admin/providers/desactive.blade.php ENDPATH**/ ?>