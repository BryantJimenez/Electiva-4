<?php $__env->startSection('title', 'Inicio'); ?>
<?php $__env->startSection('page-title', 'Panel de Inicio'); ?>

<?php $__env->startSection('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/chartist-js/dist/chartist.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/chartist-js/dist/chartist-init.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-3">
				<div class="card bg-info text-white">
					<div class="card-body">
						<div class="d-flex">
							<div class="stats">
								<h1 class="text-white"><?php echo e($sale); ?></h1>
								<h6 class="text-white">Ventas</h6>
							</div>
							<div class="stats-icon text-right ml-auto"><i class="fa fa-dollar (alias) display-5 op-3 text-dark"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card bg-success text-white">
					<div class="card-body">
						<div class="d-flex">
							<div class="stats">
								<h1 class="text-white"><?php echo e($category); ?></h1>
								<h6 class="text-white">Categorías</h6>
							</div>
							<div class="stats-icon text-right ml-auto"><i class="fa fa-tasks display-5 op-3 text-dark"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card bg-warning text-white">
					<div class="card-body">
						<div class="d-flex">
							<div class="stats">
								<h1 class="text-white"><?php echo e($customer); ?></h1>
								<h6 class="text-white">Clientes</h6>
							</div>
							<div class="stats-icon text-right ml-auto"><i class="fa fa-user-plus display-5 op-3 text-dark"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card bg-danger text-white">
					<div class="card-body">
						<div class="d-flex">
							<div class="stats">
								<h1 class="text-white"><?php echo e($product); ?></h1>
								<h6 class="text-white">Productos</h6>
							</div>
							<div class="stats-icon text-right ml-auto"><i class="fa fa-shopping-cart display-5 op-3 text-dark"></i></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('/admins/vendors/chartist-js/dist/chartist.min.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/chartist-js/dist/chartist-init.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\losFranceses - copia\resources\views/admin/home.blade.php ENDPATH**/ ?>