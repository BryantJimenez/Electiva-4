<?php $__env->startSection('title', 'Lista de Productos'); ?>
<?php $__env->startSection('page-title', 'Lista de Productos'); ?>

<?php $__env->startSection('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/lobibox/Lobibox.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/dropify/css/dropify.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/multiselect/bootstrap.multiselect.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item">Productos</li>
<li class="breadcrumb-item active">Lista</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-12">
		<?php echo $__env->make('admin.partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div class="card">
			<div class="card-body">
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Agregar Producto</button>
				<a href="<?php echo e(route('productos.desactivados')); ?>"><button type="button" class="btn btn-danger">Productos Desactivados</button></a>
				<div class="table-responsive">
					<table id="tabla" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Codigo</th>
								<th>Nombre</th>
								<th>Categoría</th>
								<th>Stock</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($num++); ?></td>
								<td><?php echo e($product->cod); ?></td>
								<td>
									<span class="image-list">
										<a data-toggle="tooltip" data-placement="bottom" data-html="true" title="<img src='<?php echo e(asset('/admins/img/products/'.$product->image)); ?>' style='width: 150px; height: 150px;' ><br><b><?php echo e($product->name); ?></b>"><img src="<?php echo e(asset('/admins/img/products/'.$product->image)); ?>" class="img-circle" alt="Foto del Producto" width="40" height="40" /> <?php echo e($product->name); ?></a>
									</span>
								</td>
								<td><?php echo e($product->category->name); ?></td>
								<td><?php echo stock($product->stock); ?></td>
								<td class="d-flex">
									<a class="btn btn-primary btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Ver Más" href="<?php echo e(route('productos.show', ['slug' => $product->slug])); ?>" ><i class="mdi mdi-account-card-details"></i></a>&nbsp;&nbsp;
									<a class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar" href="<?php echo e(route('productos.edit', ['slug' => $product->slug])); ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
									<?php if($product->state==0): ?>
									<button class="btn btn-success btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Activar" onclick="activateProduct('<?php echo e($product->slug); ?>')"><i class="fa fa-check"></i></button>
									<?php else: ?>
									<button class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Desactivar" onclick="deactivateProduct('<?php echo e($product->slug); ?>')"><i class="fa fa-history"></i></button>
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

<div class="modal fade" id="deactivateProduct" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres desactivar este producto?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<form action="#" method="POST" id="formDeactivateProduct">
					<?php echo csrf_field(); ?>
					<?php echo method_field('PUT'); ?>
					<button type="submit" class="btn btn-primary">Desactivar</button>
				</form>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="activateProduct" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres activar este producto?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<form action="#" method="POST" id="formActivateProduct">
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
				<h4 class="modal-title" id="exampleModalLabel1">Agregar Producto</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="<?php echo e(route('productos.store')); ?>" method="POST" class="form" id="formProduct" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
					<div class="row">
						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-sort-alpha-desc"></i></div>
								<select class="form-control" value="<?php echo e(old('category_id')); ?>" required name="category_id">
									<option value="">Seleccionar Categoría</option>
									<?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						</div>
						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-handshake-o"></i></div>
								<select class="form-control" value="<?php echo e(old('provider_id')); ?>" required name="provider_id">
									<option value="">Seleccionar Proveedor</option>
									<?php $__currentLoopData = $provider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($pro->id); ?>"><?php echo e($pro->name); ?> <strong><?php echo userType($pro->type); ?></strong></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						</div>
						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-address-card-o"></i></div>
								<input type="text" class="form-control" required name="name" value="<?php echo e(old('name')); ?>" placeholder="Ingresar Nombre">
							</div>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-barcode"></i></div>
								<input type="text" class="form-control" required name="cod" value="<?php echo e(old('cod')); ?>" autocomplete="nope" placeholder="Ingresar Código">
							</div>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-warning (alias)"></i></div>
								<input type="text" class="form-control" required name="stock" value="<?php echo e(old('stock')); ?>" autocomplete="nope" placeholder="Ingresar Stock">
							</div>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-arrow-circle-up"></i></div>
								<input type="number" class="form-control" id="nuevoPrecioCompra" required name="purchase_price" value="<?php echo e(old('purchase_price')); ?>" placeholder="Precio Compra">
							</div>
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-arrow-circle-down"></i></div>
								<input type="number" step="any" min="0" class="form-control" id="nuevoPrecioVenta" required name="sale_price" value="<?php echo e(old('sale_price')); ?>" placeholder="Precio de Venta">
							</div>
						</div>
						<div class="form-group col-lg-4 col-md-4 col-12">
						</div>
						<div class="col-lg-4 col-md-4 col-12">
							<input type="checkbox" class="porcentaje" id="basic_checkbox_2" />
							<label for="basic_checkbox_2" >Utilizar Porcentaje</label>
						</div>
						<div class="form-group col-lg-4 col-md-4 col-12">
							<div class="input-group">
								<input type="number" class="form-control nuevoPorcentaje" required min="0" value="40">
								<div class="input-group-addon"><i class="fa fa-percent"></i></div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label >Subir Archivo</label>
						<input type="file" name="image" accept="image/*" id="input-file-now" class="dropify" data-height="125" data-max-file-size="20M" data-allowed-file-extensions="jpg png jpeg web3" />
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary" action="product">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- /.modal -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script type="text/javascript">
/*=============================================
AGREGANDO PRECIO DE VENTA
=============================================*/
$("#nuevoPrecioCompra, #editarPrecioCompra").change(function(){

	if($(".porcentaje").prop("checked")){

		var valorPorcentaje = $(".nuevoPorcentaje").val();
		
		var porcentaje = Number(($("#nuevoPrecioCompra").val()*valorPorcentaje/100))+Number($("#nuevoPrecioCompra").val());

		var editarPorcentaje = Number(($("#editarPrecioCompra").val()*valorPorcentaje/100))+Number($("#editarPrecioCompra").val());

		$("#nuevoPrecioVenta").val(porcentaje);
		$("#nuevoPrecioVenta").prop("readonly",true);

		$("#editarPrecioVenta").val(editarPorcentaje);
		$("#editarPrecioVenta").prop("readonly",true);

	} else{

	}

})

/*=============================================
CAMBIO DE PORCENTAJE
=============================================*/
$(".nuevoPorcentaje").change(function(){

	if($(".porcentaje").prop("checked")){

		var valorPorcentaje = $(this).val();
		
		var porcentaje = Number(($("#nuevoPrecioCompra").val()*valorPorcentaje/100))+Number($("#nuevoPrecioCompra").val());

		var editarPorcentaje = Number(($("#editarPrecioCompra").val()*valorPorcentaje/100))+Number($("#editarPrecioCompra").val());

		$("#nuevoPrecioVenta").val(porcentaje);
		$("#nuevoPrecioVenta").prop("readonly",true);

		$("#editarPrecioVenta").val(editarPorcentaje);
		$("#editarPrecioVenta").prop("readonly",true);

	}

})

$(".porcentaje").on("ifUnchecked", function(){

	$("#nuevoPrecioVenta").html("readonly",false);
	$("#editarPrecioVenta").html("readonly",false);

})

$(".porcentaje").on("ifChecked", function(){

	$("#nuevoPrecioVenta").html("readonly",true);
	$("#editarPrecioVenta").html("readonly",true);

})

</script>

<script src="<?php echo e(asset('/admins/vendors/dropify/js/dropify.min.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/multiselect/bootstrap-multiselect.js')); ?>"></script>

<script src="<?php echo e(asset('/admins/vendors/validate/additional-methods.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/messages_es.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/js/validate.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/datatables/jquery.dataTables.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\losFranceses\resources\views/admin/products/index.blade.php ENDPATH**/ ?>