<?php $__env->startSection('title', 'Editar Cliente'); ?>
<?php $__env->startSection('page-title', 'Editar Cliente'); ?>

<?php $__env->startSection('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/lobibox/Lobibox.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/dropify/css/dropify.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/select2/select2.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/select2/select2-bootstrap.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('clientes.index')); ?>">Clientes</a></li>
<li class="breadcrumb-item active">Editar</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				<?php echo $__env->make('admin.partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				<h6 class="card-subtitle">Campos obligatorios (<b class="text-danger">*</b>)</h6>
				<form action="<?php echo e(route('clientes.update', ['slug' => $customer->slug])); ?>" method="POST" class="form" id="formCustomer" enctype="multipart/form-data">
					<?php echo method_field('PUT'); ?>
					<?php echo csrf_field(); ?>
					<div class="row">
						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Nombre<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="name" required placeholder="Introduzca un nombre" value="<?php echo e($customer->name); ?>" id="name" minlength="2" maxlength="191">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">DNI (Opcional)</label>
							<input class="form-control" type="text" name="dni" placeholder="Introduzca su DNI" value="<?php echo e($customer->dni); ?>" id="dni" minlength="5" maxlength="15">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Teléfono<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="phone" required placeholder="Introduzca un teléfono" value="<?php echo e($customer->phone); ?>" id="phone" minlength="5" maxlength="15">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Correo Electrónico (Opcional)</label>
							<input class="form-control" type="email" name="email" placeholder="Introduzca un correo electrónico" value="<?php echo e($customer->email); ?>" minlength="5" maxlength="191">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Dirección<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="address" required placeholder="Introduzca su dirección exacta" value="<?php echo e($customer->address); ?>" minlength="5" maxlength="191">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Tipo<b class="text-danger">*</b></label>
							<select class="form-control" name="type" required>
								<option value="">Seleccione</option>
								<option value="1" <?php if($customer->type==1): ?> selected <?php endif; ?>>Administrador</option>
								<option value="2" <?php if($customer->type==2): ?> selected <?php endif; ?>>Vendedor</option>
								<option value="3" <?php if($customer->type==3): ?> selected <?php endif; ?>>Especial</option>
								<option value="4" <?php if($customer->type==4): ?> selected <?php endif; ?>>Proveedor Particular</option>
								<option value="5" <?php if($customer->type==5): ?> selected <?php endif; ?>>Proveedor Empresarial</option>
								<option value="6" <?php if($customer->type==6): ?> selected <?php endif; ?>>Cliente</option>
							</select>
						</div>

						<div class="form-group col-12">
							<div class="btn-group" role="group">
								<button type="submit" class="btn btn-primary" action="customer">Actualizar</button>
								<a href="<?php echo e(route('clientes.index')); ?>" class="btn btn-secondary">Volver</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('/admins/vendors/dropify/js/dropify.min.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/select2/es.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/lobibox/Lobibox.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/jquery.validate.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/additional-methods.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/messages_es.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/js/validate.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USUARIO\Desktop\electiva-4\resources\views/admin/customers/edit.blade.php ENDPATH**/ ?>