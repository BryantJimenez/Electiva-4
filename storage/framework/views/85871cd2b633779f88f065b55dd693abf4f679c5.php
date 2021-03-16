<?php $__env->startSection('title', 'Lista de Presupuestos'); ?>
<?php $__env->startSection('page-title', 'Lista de Presupuestos'); ?>

<?php $__env->startSection('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/datepicker/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/lobibox/Lobibox.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item">Presupuestos</li>
<li class="breadcrumb-item active">Lista</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				<?php echo $__env->make('admin.partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				
				<a href="<?php echo e(route('presupuestos.create')); ?> ">
					<button class="btn btn-primary" type="button">Registrar</button>
				</a>
				<div class="table-responsive">
					<table id="tabla" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Cliente</th>
								<th>Teléfono</th>
								<th>Vehículo</th>
								<th>Total</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $budgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $budget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($budget->work==NULL): ?>
							<tr>
								<td><?php echo e($num++); ?></td>
								<td>
									<span class="image-list">
										<a data-toggle="tooltip" data-placement="bottom" data-html="true" title="<img src='<?php echo e(asset('/admins/img/users/'.$budget->user->photo)); ?>' style='width: 150px; height: 150px;' ><br><b><?php echo e($budget->user->name." ".$budget->user->lastname); ?></b>"><img src="<?php echo e(asset('/admins/img/users/'.$budget->user->photo)); ?>" class="img-circle" alt="Foto de perfil" width="40" height="40" /> <?php echo e($budget->user->name." ".$budget->user->lastname); ?></a>
									</span>
								</td>
								<td><?php echo e($budget->user->phone); ?></td>
								<td><?php echo e($budget->vehicle->domine); ?></td>
								<td><?php echo e(number_format($budget->total, 2, ',', '.')); ?></td>
								<td class="d-flex mr-0">
									<a class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ver Más" href="<?php echo e(route('presupuestos.show', ['slug' => $budget->slug])); ?>"><i class="mdi mdi-file"></i></a>&nbsp;&nbsp;
									<a class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar" href="<?php echo e(route('presupuestos.edit', ['slug' => $budget->slug])); ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
									<a class="btn btn-secondary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="PDF" href="<?php echo e(route('presupuestos.pdf', ['slug' => $budget->slug])); ?>" target="_blank"><i class="mdi mdi-file-pdf"></i></a>&nbsp;&nbsp;
									<button class="btn btn-dark btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Enviar Correo" onclick="emailBudget('<?php echo e($budget->slug); ?>')"><i class="mdi mdi-email"></i></button>&nbsp;&nbsp;
									<?php if($budget->schedule): ?>
									<button class="btn btn-warning btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar Turno" onclick="editTurn('<?php echo e($budget->schedule->id); ?>')"><i class="fa fa-calendar"></i></button>&nbsp;&nbsp;
									<?php else: ?>
									<button class="btn btn-warning btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Registrar Turno" onclick="registerTurn('<?php echo e($budget->slug); ?>')"><i class="fa fa-calendar"></i></button>&nbsp;&nbsp;
									<?php endif; ?>
									<button class="btn btn-success btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Aceptar" onclick="approveBudget('<?php echo e($budget->slug); ?>')"><i class="fa fa-check"></i></button>&nbsp;&nbsp;
									<button class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Eliminar" onclick="deleteBudget('<?php echo e($budget->slug); ?>')"><i class="fa fa-trash"></i></button>
								</td>
							</tr>
							<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="approveBudget" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres aceptar este presupuesto?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<form action="<?php echo e(route('presupuestos.approve')); ?>" method="POST">
					<?php echo csrf_field(); ?>
					<input type="hidden" name="budget_id" id="inputApproveBudget">
					<button type="submit" class="btn btn-primary">Aceptar</button>
				</form>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="deleteBudget" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres eliminar este presupuesto?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<form action="#" method="POST" id="formDeleteBudget">
					<?php echo csrf_field(); ?>
					<?php echo method_field('DELETE'); ?>
					<button type="submit" class="btn btn-primary">Eliminar</button>
				</form>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="budgetEmailModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ingrese el correo electrónico al que desea enviar el presupuesto</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="#" method="POST" id="formBudgetEmail">
				<?php echo csrf_field(); ?>
				<div class="modal-body">
					<h6 class="card-subtitle">Campos obligatorios (<b class="text-danger">*</b>)</h6>
					<div class="row">					
						<div class="form-group col-12">
							<label class="col-form-label">Correo Electrónico<b class="text-danger">*</b></label>
							<input type="email" class="form-control" name="email" required placeholder="Introduzca un correo electrónico" minlength="5" maxlength="191">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" action="email">Enviar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="registerTurn" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Registro de turno</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?php echo e(route('agendas.store')); ?>" method="POST" id="formTurn">
				<?php echo csrf_field(); ?>
				<div class="modal-body">
					<h6 class="card-subtitle">Campos obligatorios (<b class="text-danger">*</b>)</h6>
					<div class="row">					
						<div class="form-group col-12">
							<label class="col-form-label">Título<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="title" required placeholder="Introduzca un título" minlength="2" maxlength="191">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Fecha<b class="text-danger">*</b></label>
							<input class="form-control dateTurn" type="text" name="date" required placeholder="Seleccione una fecha">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Hora (De 8:00 AM a 7:00 PM)<b class="text-danger">*</b></label>
							<input class="form-control timeTurn" type="text" name="time" required placeholder="Seleccione una hora">
						</div>
						

						<div class="form-group col-12">
							<label class="col-form-label">Descripción<b class="text-danger">*</b></label>
							<textarea class="form-control" name="description" required placeholder="Introduzca la descripción del trabajo" minlength="5" maxlength="191"></textarea>
						</div>

						<input type="hidden" name="budget_id">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" action="turn">Guardar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="editTurn" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Editar turno</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="#" method="POST" id="formEditTurn">
				<?php echo csrf_field(); ?>
				<?php echo method_field('PUT'); ?>
				<div class="modal-body">
					<h6 class="card-subtitle">Campos obligatorios (<b class="text-danger">*</b>)</h6>
					<div class="row">					
						<div class="form-group col-12">
							<label class="col-form-label">Título<b class="text-danger">*</b></label>
							<input class="form-control" type="text" name="title" required placeholder="Introduzca un título" minlength="2" maxlength="191">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Fecha<b class="text-danger">*</b></label>
							<input class="form-control dateTurn" type="text" name="date" required placeholder="Seleccione una fecha">
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<label class="col-form-label">Hora (De 8:00 AM a 7:00 PM)<b class="text-danger">*</b></label>
							<input class="form-control timeTurn" type="text" name="time" required placeholder="Seleccione una hora">
						</div>

						<div class="form-group col-12">
							<label class="col-form-label">Descripción<b class="text-danger">*</b></label>
							<textarea class="form-control" name="description" required placeholder="Introduzca la descripción del trabajo" minlength="5" maxlength="191"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" action="turnEdit">Actualizar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('/admins/vendors/lobibox/Lobibox.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/jquery.validate.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/additional-methods.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/messages_es.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/js/validate.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/datepicker/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sistema-Cucar\resources\views/admin/budgets/index.blade.php ENDPATH**/ ?>