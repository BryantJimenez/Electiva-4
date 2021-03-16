<?php $__env->startSection('title', 'Perfil'); ?>
<?php $__env->startSection('page-title', 'Perfil'); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item">Perfil</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body little-profile text-center">
				<div class="pro-img m-t-20"><img src="<?php echo e(asset('/admins/img/users/'.Auth::user()->photo)); ?>" alt="user"></div>
				<h3 class="m-b-0"><?php echo e(Auth::user()->name.' '.Auth::user()->lastname); ?></h3>
				<h6 class="text-muted"><?php if(Auth::user()->type==1): ?> 'Administrador' <?php elseif(Auth::user()->type==2): ?> 'Trabajador' <?php else: ?> 'Trabajador' <?php endif; ?></h6>
			</div>
			<div class="text-center bg-light">
				<div class="row">
					<div class="col-6  p-20 b-r">
						<h4 class="m-b-0 font-medium"><?php echo e(Auth::user()->email); ?></h4><small><b>Correo Electrónico</b></small>
					</div>

					<div class="col-6  p-20">
						<h4 class="m-b-0 font-medium"><?php echo e(Auth::user()->phone); ?></h4><small><b>Teléfono</b></small>
					</div>

					<div class="col-6  p-20 b-r">
						<h4 class="m-b-0 font-medium"><?php echo e(Auth::user()->country->name); ?></h4><small><b>País de Procedencia</b></small>
					</div>

					<div class="col-6  p-20">
						<h4 class="m-b-0 font-medium"><?php echo e(Auth::user()->district->name); ?></h4><small><b>Barrio</b></small>
					</div>

					<div class="col-6  p-20 b-r">
						<h4 class="m-b-0 font-medium"><?php echo e(Auth::user()->dni); ?></h4><small><b>Género</b></small>
					</div>

					<div class="col-6  p-20">
						<h4 class="m-b-0 font-medium"><?php echo e(Auth::user()->address); ?></h4><small><b>Dirección</b></small>
					</div>

				</div>
			</div>
		</div>
	</div>

	<?php if(count(Auth::user()->vehicles)>0): ?>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h3>Vehículos del cliente</h3>
				<div class="table-responsive">
					<table id="tabla" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Dominio</th>
								<th>Marca/Modelo/Versión</th>
								<th>Año</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = Auth::user()->vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($num++); ?></td>
								<td><?php echo e($vehicle->domine); ?></td>
								<td><?php echo e($vehicle->version->model->brand->name." - ".$vehicle->version->model->name." - ".$vehicle->version->name); ?></td>
								<td><?php echo e($vehicle->year); ?></td>
								<td class="d-flex">
									<a class="btn btn-primary btn-circle btn-sm" href="<?php echo e(route('vehiculos.show', ['slug' => $vehicle->slug])); ?>"><i class="fa fa-car"></i></a>&nbsp;&nbsp;
									<a class="btn btn-info btn-circle btn-sm" href="<?php echo e(route('vehiculos.edit', ['slug' => $vehicle->slug])); ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
									<?php if(count($vehicle->budgets)==0): ?>
									<button class="btn btn-danger btn-circle btn-sm" onclick="deleteVehicle('<?php echo e($vehicle->slug); ?>')"><i class="fa fa-trash"></i></button>
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
	<?php endif; ?>

	<?php if(count(Auth::user()->budgets)>0): ?>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h3>Presupuestos y trabajos del cliente</h3>
				<div class="table-responsive">
					<table id="tabla" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Dominio</th>
								<th>Tipo</th>
								<th>Estado</th>
								<th>Total</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = Auth::user()->budgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $budget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($num2++); ?></td>
								<td><?php echo e($budget->vehicle->domine); ?></td>
								<td><span class="badge badge-dark"><?php if($budget->work): ?> Trabajo <?php else: ?> Presupuesto <?php endif; ?></span></td>
								<td><?php if($budget->work): ?> <?php echo workState($budget->work->state); ?> <?php else: ?> <span class="badge badge-success">Activo</span> <?php endif; ?></td>
								<td><?php echo e(number_format($budget->total, 2, ',', '.')); ?></td>
								<td class="d-flex mr-0">
									<a class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ver Más" href="<?php echo e(route('presupuestos.show', ['slug' => $budget->slug])); ?>"><i class="mdi mdi-file"></i></a>&nbsp;&nbsp;
									<a class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar" href="<?php echo e(route('presupuestos.edit', ['slug' => $budget->slug])); ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
									<a class="btn btn-secondary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="PDF" href="<?php echo e(route('presupuestos.pdf', ['slug' => $budget->slug])); ?>" target="_blank"><i class="mdi mdi-file-pdf"></i></a>&nbsp;&nbsp;
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<div class="card-body text-center">
		<a href="<?php echo e(route('perfil.update')); ?>" class="m-t-10 m-b-20 waves-effect waves-dark btn btn-success btn-md btn-rounded">Modificar</a>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\losFranceses\resources\views/admin/users/profile.blade.php ENDPATH**/ ?>