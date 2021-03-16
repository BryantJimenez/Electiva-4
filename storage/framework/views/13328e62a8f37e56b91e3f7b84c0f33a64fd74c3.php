<?php $__env->startSection('title', 'Registro de Contactos'); ?>
<?php $__env->startSection('page-title', 'Registro de Contactos'); ?>

<?php $__env->startSection('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/select2/select2.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/select2/select2-bootstrap.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('contactos.index')); ?>">Contactos</a></li>
<li class="breadcrumb-item active">Registro</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				<?php echo $__env->make('admin.partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				<h6 class="card-subtitle">Campos obligatorios (<b class="text-danger">*</b>)</h6>
				<form action="<?php echo e(route('contactos.store')); ?>" method="POST" class="form" id="formContact">
					<?php echo csrf_field(); ?>
					<div class="row">
						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Nombre Completo<b class="text-danger">*</b></label>
							<input type="text" class="form-control" name="name" required placeholder="Introduzca el nombre del contacto" value="<?php echo e(old('name')); ?>" id="name" minlength="2" maxlength="191">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Cargo<b class="text-danger">*</b></label>
							<input type="text" class="form-control" name="rol" required placeholder="Introduzca el cargo del contacto" value="<?php echo e(old('rol')); ?>" minlength="2" maxlength="191">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Correo Electrónico<b class="text-danger">*</b></label>
							<input type="email" class="form-control" name="email" required placeholder="Introduzca el correo electrónico del contacto" value="<?php echo e(old('email')); ?>" minlength="5" maxlength="191">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Teléfono<b class="text-danger">*</b></label>
							<input type="text" class="form-control" name="phone" required placeholder="Introduzca el teléfono del contacto" value="<?php echo e(old('phone')); ?>" id="phone" minlength="5" maxlength="15">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Compañía de Seguros<b class="text-danger">*</b></label>
							<select class="form-control select2" name="company_id" required>
								<option value="">Seleccione</option>
								<?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $co): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($co->slug); ?>" <?php if(old('company_id')==$co->slug): ?> selected <?php endif; ?>><?php echo e($co->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>

						<div class="form-group col-12">
							<div class="btn-group" role="group">
								<button type="submit" class="btn btn-primary" action="contact">Guardar</button>
								<a href="<?php echo e(route('contactos.index')); ?>" class="btn btn-secondary">Volver</a>
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
<script src="<?php echo e(asset('/admins/vendors/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/select2/es.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/jquery.validate.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/additional-methods.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/messages_es.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/js/validate.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\losFranceses\resources\views/admin/contacts/create.blade.php ENDPATH**/ ?>