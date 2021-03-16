<?php $__env->startSection('title', 'Perfil de Usuario'); ?>
<?php $__env->startSection('page-title', 'Perfil de Usuario'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('usuarios.index')); ?>">Usuarios</a></li>
<li class="breadcrumb-item active">Perfil</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body little-profile text-center">
				<div class="pro-img m-t-20"><img src="<?php echo e('/admins/img/users/'.$user->photo); ?>" alt="user"></div>
				<h3 class="m-b-0"><?php echo e($user->name); ?></h3>
				<h6><?php echo userType($user->type); ?></h6>
			</div>
			<div class="text-center bg-light">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-12 p-20 b-r">
						<h4 class="m-b-0 font-medium"><?php echo e($user->dni); ?></h4><small><b>DNI</b></small>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-12 p-20">
						<h4 class="m-b-0 font-medium"><?php echo userState($user->state); ?></h4><small><b>Estado</b></small>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-12 p-20 b-r">
						<h4 class="m-b-0 font-medium"><?php echo e($user->email); ?></h4><small><b>Correo Electrónico</b></small>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-12 p-20">
						<h4 class="m-b-0 font-medium"><?php if($user->phone!==NULL): ?> <?php echo e($user->phone); ?> <?php else: ?> <span class="badge badge-dark">Desconocido</span> <?php endif; ?></h4><small><b>Teléfono</b></small>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-12 p-20">
						<h4 class="m-b-0 font-medium"><?php echo e($user->address); ?></h4><small><b>Dirección</b></small>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-12 p-20">
						<h4 class="m-b-0 font-medium"><?php echo e($user->user); ?></h4><small><b>Usuario</b></small>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="card-body text-center">
		<a href="<?php echo e(route('usuarios.edit', ['slug' => $user->slug])); ?>" class="m-t-10 m-b-20 waves-effect waves-dark btn btn-primary btn-md btn-rounded">Editar</a>
		<?php if($user->state==0): ?>
		<button class="m-t-10 m-b-20 waves-effect waves-dark btn btn-success btn-md btn-rounded" onclick="activateUser('<?php echo e($user->slug); ?>')">Activar</button>
		<?php else: ?>
		<button class="m-t-10 m-b-20 waves-effect waves-dark btn btn-danger btn-md btn-rounded" onclick="deactivateUser('<?php echo e($user->slug); ?>')">Desactivar</button>
		<?php endif; ?>
		<a href="<?php echo e(route('usuarios.index')); ?>" class="m-t-10 m-b-20 waves-effect waves-dark btn btn-secondary btn-md btn-rounded">Volver</a>
	</div>
</div>

<?php if($user->state==1): ?>
<div class="modal fade" id="deactivateUser" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres desactivar este usuario?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<form action="#" method="POST" id="formDeactivateUser">
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
<div class="modal fade" id="activateUser" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres activar este usuario?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<form action="#" method="POST" id="formActivateUser">
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\losFranceses\resources\views/admin/users/show.blade.php ENDPATH**/ ?>