<?php $__env->startSection('title', 'Lista de Usuarios'); ?>
<?php $__env->startSection('page-title', 'Lista de Usuarios'); ?>

<?php $__env->startSection('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/lobibox/Lobibox.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/dropify/css/dropify.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item">Usuarios</li>
<li class="breadcrumb-item active">Lista</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-12">
		<?php echo $__env->make('admin.partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div class="card">
			<div class="card-body">
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Agregar Usuario</button>
				<div class="table-responsive">
					<table id="tabla" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre Completo</th>
								<th>Usuario</th>
								<th>Tipo</th>
								<th>Estado</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($num++); ?></td>
								<td>
									<span class="image-list">
										<a data-toggle="tooltip" data-placement="bottom" data-html="true" title="<img src='<?php echo e(asset('/admins/img/users/'.$user->photo)); ?>' style='width: 150px; height: 150px;' ><br><b><?php echo e($user->name); ?></b>"><img src="<?php echo e(asset('/admins/img/users/'.$user->photo)); ?>" class="img-circle" alt="Foto de perfil" width="40" height="40" /> <?php echo e($user->name); ?></a>
									</span>
								</td>
								<td><?php echo e($user->user == NULL ? 'N/T' : $user->user); ?></td>
								<td><?php echo userType($user->type); ?></td>
								<td><?php echo userState($user->state); ?></td>
								<td class="d-flex">
									<a class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ver Más" href="<?php echo e(route('usuarios.show', ['slug' => $user->slug])); ?>" ><i class="mdi mdi-account-card-details"></i></a>&nbsp;&nbsp;
									<a class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar" href="<?php echo e(route('usuarios.edit', ['slug' => $user->slug])); ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
									<?php if($user->state==0): ?>
									<button class="btn btn-success btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Activar" onclick="activateUser('<?php echo e($user->slug); ?>')"><i class="fa fa-check"></i></button>
									<?php else: ?>
									<button class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Desactivar" onclick="deactivateUser('<?php echo e($user->slug); ?>')"><i class="fa fa-history"></i></button>
									<?php endif; ?>
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



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">Agregar Usuario</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				
				<form action="<?php echo e(route('usuarios.store')); ?>" method="POST" class="form" id="formUser" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
					<div class="row">
						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
								<input type="text" class="form-control" required name="name" value="<?php echo e(old('name')); ?>" placeholder="Ingresar Nombre">
							</div>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-key"></i></div>
								<input type="text" class="form-control" required name="user" value="<?php echo e(old('user')); ?>" autocomplete="nope" placeholder="Ingresar Usuario">
							</div>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-lock"></i></div>
								<input type="password" autocomplete="nope" required value="<?php echo e(old('password')); ?>" name="password" class="form-control" placeholder="Ingresar Contraseña">
							</div>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
								<input type="email" class="form-control" required value="<?php echo e(old('email')); ?>" autocomplete="nope" name="email" placeholder="Ingresar Email">
							</div>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
								<input type="text" class="form-control" required name="dni" value="<?php echo e(old('dni')); ?>" autocomplete="nope" placeholder="Ingresar DNI">
							</div>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-phone"></i></div>
								<input type="text" class="form-control" required name="phone" value="<?php echo e(old('phone')); ?>" autocomplete="nope" placeholder="Ingresar Teléfono">
							</div>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-group (alias)"></i></div>
								<select class="form-control" value="<?php echo e(old('type')); ?>" required name="type">
									<option value="">Seleccionar Perfil</option>
									<option value="1">Administrador</option>
									<option value="2">Especial</option>
									<option value="3">Vendedor</option>
								</select>
							</div>
						</div>
						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
								<input type="text" class="form-control" required name="address" value="<?php echo e(old('address')); ?>" autocomplete="nope" placeholder="Ingresar Dirección">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label >Subir Foto</label>
						<input type="file" name="photo" accept="image/*" id="input-file-now" class="dropify" data-height="125" data-max-file-size="20M" data-allowed-file-extensions="jpg png jpeg web3" />
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary" action="user">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /.modal -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('/admins/vendors/lobibox/Lobibox.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/dropify/js/dropify.min.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/datatables/jquery.dataTables.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ventas\resources\views/admin/users/index.blade.php ENDPATH**/ ?>