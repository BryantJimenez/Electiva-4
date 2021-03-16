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

				<?php echo $__env->make('admin.ventas.forms.form-store', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
						<tbody id="content_cart_shopping">
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
									<td><button type="button" class="btn btn-info add_product restore_button_<?php echo e($product->id); ?>"
									 data-descripcion="<?php echo e($product->name); ?>"
									 data-id="<?php echo e($product->id); ?>"
									 data-stock="<?php echo e($product->stock); ?>"
									 data-precio="<?php echo e($product->sale_price); ?>">Agregar</button></td>
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
<script src="<?php echo e(asset('/admins/vendors/multiselect/bootstrap-multiselect.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/dropify/js/dropify.min.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/select2/es.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/lobibox/Lobibox.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('/admins/vendors/validate/jquery.validate.js')); ?>"></script> -->
<script src="<?php echo e(asset('/admins/vendors/validate/additional-methods.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/messages_es.js')); ?>"></script>
<!-- <script src="<?php echo e(asset('/admins/js/validate.js')); ?>"></script> -->
<script type="text/javascript">
	
	$("#content_cart_shopping").on('click', '.add_product', function(event) {
		event.preventDefault();
		let producto = $(this);
		var idProducto = producto.data('id');
		let valor_total = $("#total_venta").val();
		var descripcion = producto.data('descripcion');
		var stock = producto.data('stock');

		var precio = parseFloat(producto.data('precio'));
		let porcentaje = $("#impuesto_valor").val();
		let impuesto_total = (precio * porcentaje / 100);
		// console.log(precio)
		// console.log(impuesto_total)
		let total = parseFloat(valor_total) + parseFloat(precio) + impuesto_total;


		producto.attr('disabled',true);

		//sumTotalProduct();
		sumTotalImpuesto();
		validateButtonDisabledAdd();

		$("#total_venta , #total_venta_validation").val(total);

	 	$("#content_product").append('<div class="row" style="background-color: #E5E5E5; padding-top: 1em;"><div class="form-group col-md-12">'+
									'<div class="input-group">'+
										'<div class="input-group-addon">'+
											'<button type="button" class="btn btn-danger btn-xs quitarProducto" data-precio="'+precio+'" data-id="'+idProducto+'"><i class="fa fa-times"></i></button>'+
										'</div>'+
										'<input type="text" class="form-control" name="descripcion[]" value="'+descripcion+'" readonly="">'+
										'<input type="hidden" name="producto_id[]" value="'+idProducto+'">'+
									'</div>'+
								'</div>'+
								'<div class="form-group col-md-6">'+
									'<div class="input-group">'+
										'<input type="number" min="1" max="'+stock+'" data-id="'+idProducto+'" data-stock="'+stock+'" data-precio="'+precio+'" value="1" class="form-control cantidad_product" name="cantidad[]" >'+
									'</div>'+
								'</div>'+
								'<div class="form-group col-md-6">'+
									'<div class="input-group">'+
										'<div class="input-group-addon"><i class="fa fa-usd"></i></div>'+
										'<input type="text" class="form-control precioProduct" value="'+precio+'" id="precio_'+idProducto+'" name="precio_unitario[]" readonly="">'+
									'</div>'+
								'</div></div><hr>') 


	});

	 $("#impuesto_valor").keydown(function(event) {
			
			sumTotalProduct();
			sumTotalImpuesto();


		});

	$("#content_product").on('click', '.quitarProducto', function(event) {
		event.preventDefault();

		$(this).parent('div').parent('div').parent('div').parent('div').remove(); //Remove field html

		sumTotalProduct();
		sumTotalImpuesto();
		validateButtonDisabled();

		$(".restore_button_"+$(this).data('id')).attr('disabled',false);
	});

	$("#content_product").on('change', '.cantidad_product', function(event) {
		event.preventDefault();
		let stock = $(this).data('stock');
		let precio = $(this).data('precio');
		let id = $(this).data('id');
	 	let value = $(this).val();
	 	let total_precio_individual = parseInt(value) * precio;
	 	
	 	$("#precio_"+id).val(total_precio_individual);

	 	sumTotalProduct();
	 	sumTotalImpuesto();
	 	
		//$("#total_venta").val(impuesto_total)
	 	if (value > stock) {
	 		alert("La cantidad supera el stock");
	 		$(this).val(1);
	 		return false;
	 	}

	 	
	});

	function sumTotalProduct(arrNumber = [])
	{

		let total_venta = $("#total_venta");
		let total_venta_value = $("#total_venta").val();
		let total_venta_validation = $("#total_venta_validation");

			$(".precioProduct").each(function(index, el) {
		 		arrNumber.push($(this).val());
		 	});
			
		 	var sum = arrNumber.reduce((pv,cv)=>{
			   return pv + (parseFloat(cv)||0);
			},0);

			total_venta.val(sum)
			total_venta_validation.val(sum)

		
	 	
	}

	function sumTotalImpuesto(arrNumber = [])
	{
		let total_venta = $("#total_venta");
		let total_venta_value = $("#total_venta").val();
		let impuesto =$("#impuesto_valor").val();
		let total_venta_validation = $("#total_venta_validation");

		$(".precioProduct").each(function(index, el) {
	 		arrNumber.push($(this).val());
	 	});

	 	var sum = arrNumber.reduce((pv,cv)=>{
		   return pv + (parseFloat(cv)||0);
		},0);


		let total_mas_impuesto = (parseFloat(total_venta_validation.val()) * impuesto / 100);

		$("#neto_impuesto").val(total_mas_impuesto);

		total_venta.val(total_mas_impuesto + parseFloat(total_venta_validation.val()));

	}

	function validateButtonDisabled(arrNumber = [])
	{
		$(".precioProduct").each(function(index, el) {
	 		arrNumber.push($(this));
	 	});
	 	let total_array = arrNumber.length + 1
		//console.log()
	 	if(arrNumber.length <= 0)
	 	{
	 		$("#btn_success_venta").attr('disabled',true);
	 	}else{
	 		$("#btn_success_venta").attr('disabled',false);
	 	}
	}

	function validateButtonDisabledAdd(arrNumber = [])
	{
		$(".precioProduct").each(function(index, el) {
	 		arrNumber.push($(this));
	 	});
	 	let total_array = arrNumber.length + 1
		//console.log()
	 	if(total_array < 1)
	 	{
	 		$("#btn_success_venta").attr('disabled',true);
	 	}else{
	 		$("#btn_success_venta").attr('disabled',false);
	 	}
	}

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ventas\resources\views/admin/ventas/create.blade.php ENDPATH**/ ?>