<?php $__env->startSection('title', 'Perfil de Cliente'); ?>
<?php $__env->startSection('page-title', 'Perfil de Cliente'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('clientes.index')); ?>">Clientes</a></li>
<li class="breadcrumb-item active">Perfil</li>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body little-profile text-center">
				<div class="pro-img m-t-20"><img src="<?php echo e('/admins/img/users/'.$customer->photo); ?>" alt="Foto de cliente"></div>
				<h3 class="m-b-0"><?php echo e($customer->name.' '.$customer->lastname); ?></h3>
				<h6><?php echo userType($customer->type); ?></h6>
			</div>
			<div class="text-center bg-light">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-12 p-20 b-r">
						<h4 class="m-b-0 font-medium"><?php echo e($customer->name); ?></h4><small><b>País de Origen</b></small>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-12 p-20">
						<h4 class="m-b-0 font-medium"><?php if($customer->dni!==NULL): ?> <?php echo e(number_format($customer->dni, 0, ".", ".")); ?> <?php else: ?> <span class="badge badge-dark">Desconocido</span> <?php endif; ?></h4><small><b>DNI</b></small>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-12 p-20 b-r">
						<h4 class="m-b-0 font-medium"><?php if($customer->email!==NULL): ?> <?php echo e($customer->email); ?> <?php else: ?> <span class="badge badge-dark">Desconocido</span> <?php endif; ?></h4><small><b>Correo Electrónico</b></small>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-12 p-20">
						<h4 class="m-b-0 font-medium"><?php echo e($customer->phone); ?></h4><small><b>Teléfono</b></small>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-12 p-20">
						<h4 class="m-b-0 font-medium"><?php echo userState($customer->state); ?></h4><small><b>Estado</b></small>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-6 col-12 p-20">
						<h4 class="m-b-0 font-medium"><?php echo e($customer->address); ?></h4><small><b>Dirección</b></small>
					</div>
				</div>
			</div>
		</div>
	</div>

	

	

	<div class="card-body text-center">
		<a href="<?php echo e(route('clientes.edit', ['slug' => $customer->slug])); ?>" class="m-t-10 m-b-20 waves-effect waves-dark btn btn-primary btn-md btn-rounded">Editar</a>
		<a href="<?php echo e(route('clientes.index')); ?>" class="m-t-10 m-b-20 waves-effect waves-dark btn btn-secondary btn-md btn-rounded">Volver</a>
	</div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\losFranceses\resources\views/admin/customers/show.blade.php ENDPATH**/ ?>