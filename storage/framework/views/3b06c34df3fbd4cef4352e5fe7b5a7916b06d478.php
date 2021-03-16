<?php $__env->startSection('title', 'Perfil de Proveedor'); ?>
<?php $__env->startSection('page-title', 'Perfil de Proveedor'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('proveedores.index')); ?>">Proveedores</a></li>
<li class="breadcrumb-item active">Perfil</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<div class="row">
	<div class="col-lg-8 col-md-8 col-8">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title"><span class="lstick"></span> Proveedor # <?php echo e($provider->id); ?></h4>
				<ul class="feeds">
					<li>
						<div class="bg-light-info"><i class="fa fa-user"></i>
						</div>Nombre: <?php echo e($provider->name); ?> 

					</li>
					<li>
						<div class="bg-light-success"><i class="fa fa-id-card-o"></i>
						</div>DNI: <?php echo e($provider->dni); ?> 

					</li>
					<li>
						<div class="bg-light-danger"><i class="fa fa-envelope"></i>
						</div>Email: <?php echo e($provider->email); ?>


					</li>
					<li>
						<div class="bg-light-inverse"><i class="fa fa-phone"></i>
						</div>Teléfono: <?php echo e($provider->phone); ?> 
					</li>

					<li>
						<div class="bg-light-danger"><i class="fa fa-map-marker"></i>
						</div>Dirección: <?php echo e($provider->address); ?>

					</li>
					<li>
						<div class="bg-light-inverse"><i class="fa fa-group (alias)"></i>
						</div>Tipo: <?php if($provider->type==4): ?><strong>Proveedor Particular</strong>
									<?php elseif($provider->type==5): ?><strong>Proveedor Empresarial</strong>
									<?php endif; ?>

					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-lg-4 col-md-4 col-4">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title"><span class="lstick"></span> Acciones</h4>
				<ul class="feeds">
					<li>
						<a href="<?php echo e(route('proveedores.edit', ['slug' => $provider->slug])); ?>" class="m-t-10 m-b-20 waves-effect waves-dark btn btn-primary btn-md btn-rounded">Editar</a>
					</li>
					<li>
						<?php if($provider->state==0): ?>
						<button class="m-t-10 m-b-20 waves-effect waves-dark btn btn-success btn-md btn-rounded" onclick="activateProvider('<?php echo e($provider->slug); ?>')">Activar</button>
						<?php else: ?>
						<button class="m-t-10 m-b-20 waves-effect waves-dark btn btn-danger btn-md btn-rounded" onclick="deactivateProvider('<?php echo e($provider->slug); ?>')">Desactivar</button>
						<?php endif; ?>
					</li>
					<li>
						<a href="<?php echo e(route('proveedores.index')); ?>" class="m-t-10 m-b-20 text-center waves-effect waves-dark btn btn-secondary btn-md btn-rounded">Volver</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<?php if($provider->state==1): ?>
<div class="modal fade" id="deactivateProvider" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres desactivar este Proveedor?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<form action="#" method="POST" id="formDeactivateProvider">
					<?php echo csrf_field(); ?>
					<?php echo method_field('PUT'); ?>
					<button type="submit" class="btn btn-primary">Desactivar</button>
				</form>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>
<?php else: ?>
<div class="modal fade" id="activateProvider" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres activar este Proveedor?</h5>
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
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\losFranceses\resources\views/admin/providers/show.blade.php ENDPATH**/ ?>