<form action="<?php echo e(route('ventas.store')); ?>" method="POST" class="form" id="formProduct" enctype="multipart/form-data">
	<?php echo csrf_field(); ?>
	<div class="row">
		<div class="form-group col-lg-12 col-md-12 col-12">
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-user"></i></div>
				<input type="text" class="form-control" name="name" value="<?php echo e(Auth::user()->name); ?>" readonly="">
				<input type="hidden"  name="vendedor_id" value="<?php echo e(Auth::user()->id); ?>" >
			</div>
		</div>

		<div class="form-group col-lg-6 col-md-6 col-12">
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-key"></i></div>
				<input type="text" class="form-control" name="codigo" value="<?php echo e($codigo); ?>" readonly="">
			</div>
		</div>

		<div class="form-group col-lg-6">
			<button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Agregar un Cliente</button>
		</div>

		<div class="form-group col-lg-12 col-md-12 col-12">
			<select class="form-control multiselect" value="<?php echo e(old('category_id')); ?>" required name="cliente_id">
				<option value="">Seleccionar un Cliente</option>
				<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
		</div>
	</div>

	<div id="content_product">
	</div>
	

		<div class="form-group col-md-12" id="content_product">
		</div>
	<div class="row">
		<div class="form-group col-lg-5 col-md-5 col-12">
			<label class="col-form-label"><strong>Impuesto</strong></label>
			<div class="input-group">
				<input type="number" id="impuesto_valor" class="form-control nuevoPorcentaje" value="0" min="0">
				<div class="input-group-addon"><i class="fa fa-percent"></i></div>
			</div>
		</div>

		<div class="form-group col-lg-5 col-md-5 col-12">
			<label class="col-form-label"><strong>Total</strong></label>
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-dollar (alias)"></i></div>
				<input type="number" class="form-control" id="total_venta" readonly="" name="total" required min="0" value="0">
				<input type="hidden"  id="total_venta_validation" name="neto">
				<input type="hidden" name="impuestos" id="neto_impuesto">
			</div>
		</div>

		<?php echo $__env->make('admin.ventas.forms.pagos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary" id="btn_success_venta" disabled="" action="product">Guardar Venta</button>
	</div>
</form><?php /**PATH C:\xampp\htdocs\losFranceses - copia\resources\views/admin/ventas/forms/form-store.blade.php ENDPATH**/ ?>