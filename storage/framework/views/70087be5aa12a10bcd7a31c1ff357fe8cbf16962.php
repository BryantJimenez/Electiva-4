<?php $__env->startSection('title', 'Lista de Ventas'); ?>
<?php $__env->startSection('page-title', 'Lista de Ventas'); ?>

<?php $__env->startSection('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/lobibox/Lobibox.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item">Ventas</li>
<li class="breadcrumb-item active">Lista</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
				<div class="col-lg-3">
					<a href="<?php echo e(route('ventas.create')); ?>"><button type="button" class="btn btn-info">Crear Venta</button></a>
				</div>
				<div class="col-lg-3">
				</div>
				<div class="col-lg-3">
				</div>
				<div class="col-lg-3">
					<select class="form-control">
						<option value="">Rango de Fecha</option>
					</select>
				</div>
				</div>
				<div class="table-responsive">
					<table id="tabla" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>N° Factura</th>
								<th>Cliente</th>
								<th>Vendedor</th>
								<th>Forma de Pago</th>
								<th>Neto</th>
								<th>Total</th>
								<th>Fecha</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($num++); ?></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td class="d-flex">
									<a class="btn btn-success btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Imprimir Ticket" href="#"><i class="fa fa-file-text-o"></i></a>&nbsp;&nbsp;
									<a class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Imprimir PDF" href="#"><i class="fa fa-file-pdf-o"></i></a>&nbsp;&nbsp;
									<a class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ver Más" href="<?php echo e(route('ventas.show', ['slug' => $sale->slug])); ?>" ><i class="mdi mdi-account-card-details"></i></a>&nbsp;&nbsp;
									<a class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar" href="<?php echo e(route('ventas.edit', ['slug' => $sale->slug])); ?>"><i class="fa fa-edit"></i></a>
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('/admins/vendors/datatables/jquery.dataTables.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\losFranceses\resources\views/admin/sales/index.blade.php ENDPATH**/ ?>