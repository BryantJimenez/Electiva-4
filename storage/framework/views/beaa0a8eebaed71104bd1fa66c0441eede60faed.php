<?php $__env->startSection('title', 'Inicio'); ?>
<?php $__env->startSection('page-title', 'Panel de Inicio'); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body little-profile text-center">
				<h3 class="m-b-3">Introduzca el Dominio del Vehículo</h3>
				<form action="<?php echo e(route('home')); ?>" method="GET">
					<div class="row">
						<div class="input-group col-12 mb-3">
							<input type="text" class="form-control" name="search" required placeholder="Introduzca el dominio de un vehículo" value="<?php if(isset($search)): ?><?php echo e($search); ?><?php endif; ?>">
							<div class="input-group-append">
								<button type="submit" class="btn btn-primary">Buscar</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php if(isset($budgets) && count($budgets)>0): ?>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="tabla" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Dominio</th>
								<th>Cliente</th>
								<th>Teléfono</th>
								<th>Tipo</th>
								<th>Estado</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $budgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $budget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($num++); ?></td>
								<td><?php echo e($budget->vehicle->domine); ?></td>
								<td>
									<span class="image-list">
										<a data-toggle="tooltip" data-placement="bottom" data-html="true" title="<img src='<?php echo e(asset('/admins/img/users/'.$budget->user->photo)); ?>' style='width: 150px; height: 150px;' ><br><b><?php echo e($budget->user->name." ".$budget->user->lastname); ?></b>"><img src="<?php echo e(asset('/admins/img/users/'.$budget->user->photo)); ?>" class="img-circle" alt="Foto de perfil" width="40" height="40" /> <?php echo e($budget->user->name." ".$budget->user->lastname); ?></a>
									</span>
								</td>
								<td><?php echo e($budget->user->phone); ?></td>
								<td><span class="badge badge-dark"><?php if($budget->work): ?> Trabajo <?php else: ?> Presupuesto <?php endif; ?></span></td>
								<td><?php if($budget->work): ?> <?php echo workState($budget->work->state); ?> <?php else: ?> <span class="badge badge-success">Activo</span> <?php endif; ?></td>
								<td class="d-flex">
									<a class="btn btn-dark btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Vehículo" href="<?php echo e(route('vehiculos.show', ['slug' => $budget->vehicle->slug])); ?>"><i class="fa fa-car"></i></a>&nbsp;&nbsp;
									<a class="btn btn-success btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Cliente" href="<?php echo e(route('clientes.show', ['slug' => $budget->user->slug])); ?>"><i class="fa fa-user"></i></a>&nbsp;&nbsp;
									<?php if($budget->work): ?>
									<a class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Trabajo" href="<?php echo e(route('trabajos.show', ['slug' => $budget->slug])); ?>"><i class="mdi mdi-file"></i></a>
									<?php else: ?>
									<a class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Presupuesto" href="<?php echo e(route('presupuestos.show', ['slug' => $budget->slug])); ?>"><i class="mdi mdi-file"></i></a>
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
	<?php elseif(isset($budgets) && count($budgets)==0): ?>
	<?php if(count($vehicles)>0): ?>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h3 class="m-b-3 text-danger text-center">No hay ningún presupuesto o trabajo realizado para el vehículo que posea este dominio.</h3>
				<div class="table-responsive">
					<table id="tabla" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Propietario</th>
								<th>Dominio</th>
								<th>Marca</th>
								<th>Modelo</th>
								<th>Versión</th>
								<th>Año</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($num++); ?></td>
								<td><?php echo e($v->user->name." ".$v->user->lastname); ?></td>
								<td><?php echo e($v->domine); ?></td>
								<td><?php echo e($v->version->model->brand->name); ?></td>
								<td><?php echo e($v->version->model->name); ?></td>
								<td><?php echo e($v->version->name); ?></td>
								<td><?php echo e($v->year); ?></td>
								<td class="d-flex">
									<a class="btn btn-primary btn-circle btn-sm" href="<?php echo e(route('vehiculos.show', ['slug' => $v->slug])); ?>"><i class="fa fa-car"></i></a>&nbsp;&nbsp;
									<a class="btn btn-info btn-circle btn-sm" href="<?php echo e(route('vehiculos.edit', ['slug' => $v->slug])); ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
									<button class="btn btn-danger btn-circle btn-sm" onclick="deleteVehicle('<?php echo e($v->slug); ?>')"><i class="fa fa-trash"></i></button>
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php else: ?>
	<div class="col-lg-12">
		<div class="card">
			<div class="card-body little-profile text-center">
				<h3 class="m-b-3 text-danger">No hay ningún vehículo con este dominio registrado en el sistema, intentelo nuevamente con otro dominio.</h3>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('/admins/vendors/datatables/jquery.dataTables.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Sistema-Cucar\resources\views/admin/home.blade.php ENDPATH**/ ?>