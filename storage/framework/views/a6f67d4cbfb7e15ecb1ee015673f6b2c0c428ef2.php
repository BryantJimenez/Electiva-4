<?php $__env->startSection('title', 'Registro de Compañía de Seguros'); ?>
<?php $__env->startSection('page-title', 'Registro de Compañía de Seguros'); ?>

<?php $__env->startSection('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/select2/select2.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/select2/select2-bootstrap.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('companias.index')); ?>">Compañías de seguros</a></li>
<li class="breadcrumb-item active">Registro</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				<?php echo $__env->make('admin.partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				<h6 class="card-subtitle">Campos obligatorios (<b class="text-danger">*</b>)</h6>
				<form action="<?php echo e(route('companias.store')); ?>" method="POST" class="form" id="formCompany">
					<?php echo csrf_field(); ?>
					<div class="row">

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Nombre<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="name" required placeholder="Introduzca el nombre de la compañía" value="<?php echo e(old('name')); ?>" minlength="2" maxlength="191">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">CUIT<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="cuit" required placeholder="Introduzca el CUIT de la compañía" value="<?php echo e(old('cuit')); ?>" minlength="5" maxlength="20">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Provincia (Opcional)</label>
							<select class="form-control select2" id="multiselectProvinces">
								<option value="">Seleccione</option>
								<?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($province->id); ?>"><?php echo e($province->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Localidad (Opcional)<button type="button" class="btn btn-sm btn-primary ml-2 d-none" id="addLocality">Agregar</button></label>
							<select class="form-control select2" disabled id="multiselectLocalities">
								<option value="">Seleccione</option>
							</select>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Barrio (Opcional)<button type="button" class="btn btn-sm btn-primary ml-2 d-none" id="addDistrict">Agregar</button></label>
							<select class="form-control select2" name="district_id" disabled id="multiselectDistricts">
								<option value="">Seleccione</option>
							</select>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Dirección<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="address" required placeholder="Introduzca su dirección exacta" value="<?php echo e(old('address')); ?>" minlength="5" maxlength="191">
						</div>
						<div class="form-group col-12">
							<label class="col-form-label">Razón Social (Opcional)</label>
							<textarea class="form-control" name="social_reason" placeholder="Introduzca su razón social" value="<?php echo e(old('social_reason')); ?>" minlength="5" maxlength="191"></textarea>
						</div>

						<div class="form-group col-12">
							<div class="btn-group" role="group">
								<button type="submit" class="btn btn-primary" action="company">Guardar</button>
								<a href="<?php echo e(route('companias.index')); ?>" class="btn btn-secondary">Volver</a>
							</div>
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="addLocalityModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Registrar localidad</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h6 class="card-subtitle">Campos obligatorios (<b class="text-danger">*</b>)</h6>
				<div class="row">					
					<div class="form-group col-12">
						<label class="col-form-label">Nombre<b class="text-danger">*</b></label>
						<input type="text" class="form-control only-letters" name="nameLocality" placeholder="Introduzca el nombre de la localidad" minlength="2" maxlength="191" readonly>
						<p class="text-danger d-none" id="localityErrors"></p>
					</div>
				</div>

				<div class="alert alert-success d-none" id="localityAlertSuccess">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<ul>
						<li>Se ha registrado la localidad exitoamente.</li>
					</ul>
				</div>
				<div class="alert alert-danger d-none" id="localityAlertDanger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<ul>
						<li>Ha ocurrido un error, intentelo denuevo.</li>
					</ul>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="submitLocality">Guardar</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="addDistrictModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Registrar Barrio</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h6 class="card-subtitle">Campos obligatorios (<b class="text-danger">*</b>)</h6>
				<div class="row">
					<div class="form-group col-12">
						<label class="col-form-label">Nombre<b class="text-danger">*</b></label>
						<input type="text" class="form-control only-letters" name="nameDistrict" placeholder="Introduzca el nombre del barrio" minlength="2" maxlength="191" readonly>
						<p class="text-danger d-none" id="districtErrors"></p>
					</div>
				</div>

				<div class="alert alert-success d-none" id="districtAlertSuccess">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<ul>
						<li>Se ha registrado el barrio exitoamente.</li>
					</ul>
				</div>
				<div class="alert alert-danger d-none" id="districtAlertDanger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<ul>
						<li>Ha ocurrido un error, intentelo denuevo.</li>
					</ul>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="submitDistrict">Guardar</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\losFranceses\resources\views/admin/companies/create.blade.php ENDPATH**/ ?>