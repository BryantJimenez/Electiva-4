<?php $__env->startSection('title', 'Registro de Presupuesto'); ?>
<?php $__env->startSection('page-title', 'Registro de Presupuesto'); ?>

<?php $__env->startSection('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/uploader/jquery.dm-uploader.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/uploader/styles.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/select2/select2.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/select2/select2-bootstrap.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/touchspin/jquery.bootstrap-touchspin.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('presupuestos.index')); ?>">Presupuestos</a></li>
<li class="breadcrumb-item active">Registro</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				<?php echo $__env->make('admin.partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				<h6 class="card-subtitle">Campos obligatorios (<b class="text-danger">*</b>)</h6>
				<form action="<?php echo e(route('presupuestos.store')); ?>" method="POST" class="form" id="formBudget" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
					<div class="row">

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Taller<b class="text-danger">*</b></label>
							<select class="form-control" name="work_shop_id" required>
								<option value="">Seleccione</option>
								<?php $__currentLoopData = $workshops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workshop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($workshop->slug); ?>" <?php if(old('work_shop_id')==$workshop->slug): ?> selected <?php endif; ?>><?php echo e($workshop->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Cliente<b class="text-danger">*</b></label>
							<select class="form-control select2" name="customer_id" required id="selectCustomers">
								<option value="">Seleccione</option>
								<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($user->slug); ?>" <?php if(old('customer_id')==$user->slug): ?> selected <?php endif; ?>><?php echo e($user->name." ".$user->lastname); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
							<span class="text-danger d-none" id="customerError">Este cliente no existe.</span>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Vehículo<b class="text-danger">*</b></label>
							<select class="form-control" name="vehicle_id" required disabled id="selectVehicle">
								<option value="">Seleccione</option>
							</select>
							<span class="text-danger d-none" id="vehicleEmpty">Este cliente no tiene vehículos.</span>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Compañía del Vehículo<b class="text-danger">*</b></label>
							<select class="form-control" name="company_id" disabled required id="vehicleCompany">
							</select>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12 d-none" id="alfanumCode">
							<label class="col-form-label">Número de Siniestro<b class="text-danger">*</b></label>
							<input type="text" class="form-control" name="alfanum_code" placeholder="Introduzca el número del siniestro" value="<?php echo e(old('alfanum_code')); ?>" minlength="1" maxlength="191">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12 d-none" id="franchistAmount">
							<label class="col-form-label">Monto de la Franquicia<b class="text-danger">*</b></label>
							<input type="text" class="form-control franchist" name="franchist_amount" placeholder="Introduzca el monto de la franquicia" value="0">
						</div>

						<div class="form-group col-12">
							<div class="row">
								<div class="form-group col-lg-4 col-md-4 col-12">
									<label class="col-form-label">Lado<b class="text-danger">*</b></label>
									<select class="form-control side" name="side[]" required side="1">
										<option value="">Seleccione</option>
										<option>Techo</option>
										<option>Delantero</option>
										<option>Lateral Izquierdo</option>
										<option>Lateral Derecho</option>
										<option>Trasero</option>
									</select>
								</div>

								<div class="form-group col-lg-4 col-md-4 col-12">
									<label class="col-form-label">Parte del Vehículo<b class="text-danger">*</b><button type="button" class="btn btn-sm btn-primary ml-2 d-none addPart" btn="1">Agregar</button></label>
									<select class="form-control part" name="part_id[]" required disabled part="1">
										<option value="">Seleccione</option>
									</select>
								</div>
								<div class="form-group col-lg-4 col-md-4 col-12">
									<label class="col-form-label">Acción<b class="text-danger">*</b><button type="button" class="btn btn-sm btn-primary ml-2 d-none addAction" btn="1">Agregar</button></label>
									<select class="form-control action" name="action_id[]" required disabled action="1">
										<option value="">Seleccione</option>
										<?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($action->slug); ?>"><?php echo e($action->name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>

								<div class="col-12">
									<div class="row" id="newTask"></div>
								</div>

								<div class="form-group col-12">
									<button type="button" class="btn btn-primary" id="addTask"><i class="fa fa-plus"></i> Agregar</button>
								</div>
							</div>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Días de Trabajos de Chapa<b class="text-danger">*</b></label>
							<input type="text" class="form-control decimal" name="lock" required placeholder="Introduzca los días de trabajo de chapa" value="0">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Precio<b class="text-danger">*</b></label>
							<input type="text" class="form-control int" name="price_lock" required placeholder="Introduzca el precio de la chapa" value="0">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Paños de Pintura</label>
							<input type="text" class="form-control decimal" name="paint" required placeholder="Introduzca los paños de pintura" value="0" >
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Precio<b class="text-danger">*</b></label>
							<input type="text" class="form-control int" name="price_paint" required placeholder="Introduzca el precio de los paños de pintura" value="0">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Mecánica<b class="text-danger">*</b></label>
							<input type="text" class="form-control int" name="price_mechanics" required placeholder="Introduzca el precio de la mecánica" value="0">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Repuestos<b class="text-danger">*</b></label>
							<input type="text" class="form-control int" name="price_spare" required placeholder="Introduzca el precio de los repuestos" value="0">
						</div>

						<div class="form-group ml-auto col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Total</label>
							<input type="text" class="form-control" name="total" value="0" readonly id="total">
						</div>

						<div class="form-group col-lg-12 col-md-12 col-12">
							<label class="col-form-label">Observaciones Internas (Opcional)</label>
							<textarea class="form-control" name="intern_observation" placeholder="Introduzca las observaciones internas del vehículo" minlength="5" maxlength="191"><?php echo e(old('intern_observation')); ?></textarea>
						</div>

						<div class="form-group col-lg-12 col-md-12 col-12">
							<label class="col-form-label">Observaciones Públicas (Opcional)</label>
							<textarea class="form-control" name="public_observation" placeholder="Introduzca las observaciones públicas del vehículo" minlength="5" maxlength="191"><?php echo e(old('public_observation')); ?></textarea>
						</div>

						<div class="form-group col-12">
							<label class="col-form-label">Imágenes (Opcional)</label>
							<div id="drop-area" class="dm-uploader text-center py-4 px-2" style="background-color: #fff;">
								<h3 class="text-muted">Arrastra aquí tus imágenes</h3>
								<div class="btn btn-primary btn-block">
									<span>Selecciona un archivo</span>
									<input type="file" title="Selecciona un archivo" multiple>
								</div>
							</div>
							<p id="response" class="text-left py-0"></p>
						</div>

						<div class="col-12">
							<div class="row" id="images"></div>
						</div>

						<div class="form-group col-12">
							<div class="btn-group" role="group">
								<button type="submit" class="btn btn-primary" action="budget">Guardar</button>
								<a href="<?php echo e(route('presupuestos.index')); ?>" class="btn btn-secondary">Volver</a>
							</div>
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="addPartModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Registrar parte de vehículo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h6 class="card-subtitle">Campos obligatorios (<b class="text-danger">*</b>)</h6>
				<div class="row">
					<div class="form-group col-12">
						<label class="col-form-label">Nombre<b class="text-danger">*</b></label>
						<input type="text" class="form-control only-letters" name="namePart" placeholder="Introduzca el nombre de la parte del vehículo" minlength="2" maxlength="191" part="">
						<p class="text-danger d-none" id="partErrors"></p>
					</div>
				</div>

				<div class="alert alert-success d-none" id="partAlertSuccess">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<ul>
						<li>Se ha registrado la parte del vehículo exitoamente.</li>
					</ul>
				</div>
				<div class="alert alert-danger d-none" id="partAlertDanger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<ul>
						<li>Ha ocurrido un error, intentelo denuevo.</li>
					</ul>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="submitPart">Guardar</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="addActionModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Registrar acción</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h6 class="card-subtitle">Campos obligatorios (<b class="text-danger">*</b>)</h6>
				<div class="row">
					<div class="form-group col-12">
						<label class="col-form-label">Nombre<b class="text-danger">*</b></label>
						<input type="text" class="form-control only-letters" name="nameAction" placeholder="Introduzca el nombre de la acción" minlength="2" maxlength="191">
						<p class="text-danger d-none" id="actionErrors"></p>
					</div>
				</div>

				<div class="alert alert-success d-none" id="actionAlertSuccess">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<ul>
						<li>Se ha registrado la acción exitoamente.</li>
					</ul>
				</div>
				<div class="alert alert-danger d-none" id="actionAlertDanger">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<ul>
						<li>Ha ocurrido un error, intentelo denuevo.</li>
					</ul>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="submitAction">Guardar</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('/admins/vendors/uploader/jquery.dm-uploader.min.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/select2/es.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/touchspin/jquery.bootstrap-touchspin.min.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/jquery.validate.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/additional-methods.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/messages_es.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/js/validate.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sistema-Cucar\resources\views/admin/budgets/create.blade.php ENDPATH**/ ?>