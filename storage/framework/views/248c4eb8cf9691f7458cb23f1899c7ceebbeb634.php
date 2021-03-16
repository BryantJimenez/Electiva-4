<?php $__env->startSection('title', 'Registrar Venta'); ?>
<?php $__env->startSection('page-title', 'Registrar Venta'); ?>

<?php $__env->startSection('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/multiselect/bootstrap.multiselect.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/lobibox/Lobibox.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/dropify/css/dropify.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/select2/select2.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/select2/select2-bootstrap.css')); ?>">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('clientes.index')); ?>">Ventas</a></li>
<li class="breadcrumb-item active">Registrar</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-lg-5">
		<div class="card">
			<div class="card-body">
				<div class="d-flex">
					<div>
						<h4 class="card-title"><span class="lstick"></span>Realice una Venta</h4>
					</div>
				</div>

				<?php echo $__env->make('admin.partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				<form action="<?php echo e(route('ventas.store')); ?>" method="POST" class="form" id="formProduct" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
					<div class="row">
						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
								<input type="text" class="form-control" name="name" value="<?php echo e(Auth::user()->name); ?>" readonly="">
							</div>
						</div>

						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-key"></i></div>
								<input type="text" class="form-control"name="name" value="<?php echo e(old('name')); ?>" readonly="">
							</div>
						</div>

						<div class="form-group col-lg-6">
							<button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Agregar un Cliente</button>
						</div>

						<div class="form-group col-lg-12 col-md-12 col-12">
							<select class="form-control multiselect" value="<?php echo e(old('category_id')); ?>" required name="category_id">
								<option value="">Seleccionar un Cliente</option>
								<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>
						</div>

						<div class="form-group col-lg-2 col-md-2 col-12">
						</div>

						<div class="form-group col-lg-5 col-md-5 col-12">
							<label class="col-form-label"><strong>Impuesto</strong></label>
							<div class="input-group">
								<input type="number" class="form-control nuevoPorcentaje" required min="0" value="40">
								<div class="input-group-addon"><i class="fa fa-percent"></i></div>
							</div>
						</div>

						<div class="form-group col-lg-5 col-md-5 col-12">
							<label class="col-form-label"><strong>Total</strong></label>
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-dollar (alias)"></i></div>
								<input type="number" class="form-control nuevoPorcentaje" readonly="" required min="0" value="40">
							</div>
						</div>

						<div class="form-group col-lg-12 col-md-12 col-12">
							<select class="form-control" value="<?php echo e(old('category_id')); ?>" id="typePay" required name="category_id">
								<option value="0">Seleccione un método de pago</option>
								<option value="1">Efectivo</option>
								<option value="2">Tarjeta de Crédito</option>
								<option value="3 ">Tarjeta de Débito</option>
							</select>
						</div>

						<div id="one" class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Código de Transacción" name="name">
								<div class="input-group-addon"><i class="fa fa-lock"></i></div>
							</div>
						</div>

						<div id="two" class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-dollar (alias)"></i></div>
								<input type="number" class="form-control nuevoPorcentaje" required min="0" value="40">
							</div>
						</div>

						<div id="three" class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-dollar (alias)"></i></div>
								<input type="number" class="form-control nuevoPorcentaje" readonly="" required min="0" value="40">
							</div>
						</div>

						


					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary" action="product">Guardar Venta</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	

	<div class="col-lg-7">
		<div class="card">
			<div class="card-body">
				<div class="d-flex">
					<div>
						<h4 class="card-title"><span class="lstick"></span>Productos Activos</h4>
					</div>
				</div>
				<div class="table-responsive">
					<table id="tabla" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>N°</th>
								<th>Nombre</th>
								<th>Código</th>
								<th>Stock</th>
								<th>Acción</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($num++); ?></td>
								<td>									
									<span class="image-list">
										<a data-toggle="tooltip" data-placement="bottom" data-html="true" title="<img src='<?php echo e(asset('/admins/img/products/'.$product->image)); ?>' style='width: 150px; height: 150px;' ><br><b><?php echo e($product->name); ?></b>"><img src="<?php echo e(asset('/admins/img/products/'.$product->image)); ?>" class="img-circle" alt="Foto del Producto" width="40" height="40" /> <?php echo e($product->name); ?></a>
									</span>
								</td>
								<td><?php echo e($product->cod); ?></td>
								<td><?php echo stock($product->stock); ?></td>
								<form action="" method="POST">
									<?php echo csrf_field(); ?>
									<input type="hidden" name="id" id="id" value="<?php echo e($product->id); ?>">
									<td><button type="submit" id="add" class="btn btn-info">Agregar</button></td>
								</form>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	

</div>





<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel1">Agregar Cliente</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="<?php echo e(route('clientes.store')); ?>" method="POST" class="form" id="formCustomer">
					<?php echo csrf_field(); ?>

					<?php echo $__env->make('admin.partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

					<div class="row">
						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
								<input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="Ingresar Nombre">
							</div>
						</div>

						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-id-card-o"></i></div>
								<input type="text" class="form-control" required name="dni" value="<?php echo e(old('dni')); ?>" autocomplete="nope" placeholder="Ingresar DNI">
							</div>
						</div>

						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
								<input type="email" class="form-control" value="<?php echo e(old('email')); ?>" value="email" autocomplete="nope" name="email" placeholder="Ingresar Email">
							</div>
						</div>

						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-phone"></i></div>
								<input type="text" class="form-control" required name="phone" value="<?php echo e(old('phone')); ?>" autocomplete="nope" placeholder="Ingresar Teléfono">
							</div>
						</div>

						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
								<input type="text" class="form-control" required name="address" value="<?php echo e(old('address')); ?>" autocomplete="nope" placeholder="Ingresar Dirección">
							</div>
						</div>



					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary"  action="customer">Guardar Cliente</button>
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div>
<!-- /.modal -->



<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript">
	//Agregar producto del carrito
	$('#add').click(function(event) {
		var id = $('input[name=id]').val();
		$.ajax({
			url: '/ventas/agregar',
			type: 'POST',
			dataType: 'JSON',
			data: {id: id},
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		})
		.done(console.log(obj) {
			
		});
	});
</script>
<script src="<?php echo e(asset('/admins/vendors/multiselect/bootstrap-multiselect.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/dropify/js/dropify.min.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/select2/es.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/lobibox/Lobibox.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/jquery.validate.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/additional-methods.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/messages_es.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/js/validate.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\losFranceses\resources\views/admin/sales/create.blade.php ENDPATH**/ ?>