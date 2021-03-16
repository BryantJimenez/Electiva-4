<?php $__env->startSection('title', 'Editar Usuario'); ?>
<?php $__env->startSection('page-title', 'Editar Usuario'); ?>

<?php $__env->startSection('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/lobibox/Lobibox.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/dropify/css/dropify.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/select2/select2.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/select2/select2-bootstrap.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('usuarios.index')); ?>">Usuarios</a></li>
<li class="breadcrumb-item active">Editar</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				<?php echo $__env->make('admin.partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				<h6 class="card-subtitle">Campos obligatorios (<b class="text-danger">*</b>)</h6>
				<form action="<?php echo e(route('usuarios.update', ['slug' => $user->slug])); ?>" method="POST" class="form" id="formUser" enctype="multipart/form-data">
					<?php echo method_field('PUT'); ?>
					<?php echo csrf_field(); ?>
					<div class="row">
						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Nombre<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="name" required placeholder="Introduzca un nombre" value="<?php echo e($user->name); ?>" id="name" minlength="2" maxlength="191">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Usuario<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="user" required placeholder="Introduzca un apellido" value="<?php echo e($user->user); ?>" id="user" minlength="2" maxlength="191">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">DNI (Opcional)</label>
							<input class="form-control" type="text" name="dni" placeholder="Introduzca su DNI" value="<?php echo e($user->dni); ?>" id="dni" minlength="5" maxlength="15">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Correo Electrónico</label>
							<input class="form-control" type="text" value="<?php echo e($user->email); ?>" disabled>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Dirección<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="address" required placeholder="Introduzca su dirección exacta" value="<?php echo e($user->address); ?>" minlength="5" maxlength="191">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Teléfono (Opcional)</label>
							<input class="form-control" type="text" name="phone" placeholder="Introduzca un teléfono" value="<?php echo e($user->phone); ?>" id="phone" minlength="5" maxlength="15">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Tipo<b class="text-danger">*</b></label>
							<select class="form-control" name="type" required>
								<option value="">Seleccione</option>
								<option value="1" <?php if($user->type==1): ?> selected <?php endif; ?>>Administrador</option>
								<option value="2" <?php if($user->type==2): ?> selected <?php endif; ?>>Vendedor</option>
								<option value="3" <?php if($user->type==3): ?> selected <?php endif; ?>>Especial</option>
								<option value="4" <?php if($user->type==4): ?> selected <?php endif; ?>>Proveedor Particular</option>
								<option value="5" <?php if($user->type==5): ?> selected <?php endif; ?>>Proveedor Empresarial</option>
								<option value="6" <?php if($user->type==6): ?> selected <?php endif; ?>>Cliente</option>
							</select>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Estado</label>
							<input class="form-control" disabled="" type="text"
							<?php if($user->state==1): ?>
							value="Activo" 
							<?php else: ?>
							value="Inactivo"
						<?php endif; ?>>
					</div>

					<div class="form-group col-12">
						<label class="col-form-label">Foto (Opcional)</label>
						<input type="file" name="photo" accept="image/*" id="input-file-now" class="dropify" data-height="125" data-max-file-size="20M" data-allowed-file-extensions="jpg png jpeg web3" data-default-file="<?php echo e('/admins/img/users/'.$user->photo); ?>" />
					</div> 

					<div class="form-group col-12">
						<div class="btn-group" role="group">
							<button type="submit" class="btn btn-primary" action="user">Actualizar</button>
							<a href="<?php echo e(route('usuarios.index')); ?>" class="btn btn-secondary">Volver</a>
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
						<input type="text" class="form-control only-letters" name="nameLocality" placeholder="Introduzca el nombre de la localidad" minlength="2" maxlength="191">
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
						<input type="text" class="form-control only-letters" name="nameDistrict" placeholder="Introduzca el nombre del barrio" minlength="2" maxlength="191">
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
<script src="<?php echo e(asset('/admins/vendors/dropify/js/dropify.min.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/select2/es.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/lobibox/Lobibox.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/jquery.validate.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/additional-methods.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/messages_es.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/js/validate.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USUARIO\Desktop\electiva-4\resources\views/admin/users/edit.blade.php ENDPATH**/ ?>