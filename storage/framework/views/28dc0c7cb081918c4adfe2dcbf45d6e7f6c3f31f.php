<div class="form-group col-lg-12 col-md-12 col-12">
	<select class="form-control" value="<?php echo e(old('category_id')); ?>" id="typePay" required name="metodo_pago">
		<option value="">Seleccione un método de pago</option>
		<option value="EFECTIVO">Efectivo</option>
		<option value="TC">Tarjeta de Crédito</option>
		<option value="TD">Tarjeta de Débito</option>
	</select>
</div>

<div id="one" class="form-group col-lg-12 col-md-12 col-12">
	<div class="input-group">
		<input type="text" class="form-control" placeholder="Código de Transacción" name="codigo_transaccion" name="name">
		<div class="input-group-addon"><i class="fa fa-lock"></i></div>
	</div>
</div>

<div id="two" class="form-group col-md-12">
	<div class="input-group">
		<div class="input-group-addon"><i class="fa fa-dollar (alias)"></i></div>
		<input type="number" class="form-control nuevoPorcentaje" name="efectivo" required min="0" value="40">
	</div>
</div>



<?php /**PATH C:\Users\USUARIO\Desktop\electiva-4\resources\views/admin/ventas/forms/pagos.blade.php ENDPATH**/ ?>