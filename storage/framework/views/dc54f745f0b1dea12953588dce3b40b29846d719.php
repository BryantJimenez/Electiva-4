<?php $__env->startSection('title', 'Ver Producto'); ?>
<?php $__env->startSection('page-title', 'Ver Producto'); ?>

<?php $__env->startSection('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/lobibox/Lobibox.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/dropify/css/dropify.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item"><a href="<?php echo e(route('productos.index')); ?>">Productos</a></li>
<li class="breadcrumb-item active">Ver</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">

				<?php echo $__env->make('admin.partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

				
				<form action="<?php echo e(route('productos.update', ['slug' => $product->slug])); ?>" method="POST" class="form" id="formproduct" enctype="multipart/form-data">
					<?php echo method_field('PUT'); ?>
					<?php echo csrf_field(); ?>
					<div class="row">
						<div class="form-group col-lg-6 col-md-6 col-12">
							<img src="<?php echo e('/admins/img/products/'.$product->image); ?>" class="img-fluid">
						</div>
						<div class="form-group col-lg-6 col-md-6 col-12">
							<div class="form-group col-lg-12 col-md-12 col-12">
								<label class="col-form-label">Categoría</label>
								<input type="text" class="form-control" disabled="" value="<?php echo e($product->category->name); ?>">
							</div>

							<div class="form-group col-lg-12 col-md-12 col-12">
								<label class="col-form-label">Proveedor</label>
								<input type="text" class="form-control" disabled="" value="<?php echo e($product->provider->name); ?>">
							</div>

							<div class="form-group col-lg-12 col-md-12 col-12">
								<label class="col-form-label">Nombre</label>
								<input class="form-control" type="text" disabled="" name="name" required placeholder="Introduzca un nombre" value="<?php echo e($product->name); ?>" id="name" minlength="2" maxlength="191">
							</div>

							<div class="form-group col-lg-12 col-md-12 col-12">
								<label class="col-form-label">Código</label>
								<input class="form-control" type="text" disabled="" name="cod" placeholder="Introduzca su DNI" value="<?php echo e($product->cod); ?>" id="dni" minlength="5" maxlength="15">
							</div>

							<div class="form-group col-lg-12 col-md-12 col-12">
								<label class="col-form-label">Stock</label>
								<input class="form-control" type="text" disabled="" name="stock" required placeholder="Introduzca un teléfono" value="<?php echo e($product->stock); ?>">
							</div>

							<div class="form-group col-lg-12 col-md-12 col-12">
								<label class="col-form-label">Precio de Compra</label>
								<input type="number" class="form-control" disabled="" id="nuevoPrecioCompra" name="purchase_price" value="<?php echo e($product->purchase_price); ?>">
							</div>

							<div class="form-group col-lg-12 col-md-12 col-12">
								<label class="col-form-label">Precio de Venta</label>
								<input type="number" step="any" min="0" disabled="" class="form-control" id="nuevoPrecioVenta" name="sale_price" value="<?php echo e($product->sale_price); ?>">
							</div>
						</div>
					</div>

				</form>


				<div class="form-group col-12">
					<div class="btn-group" role="group">
						<a href="<?php echo e(route('productos.index')); ?>" class="btn btn-secondary">Volver</a>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('/admins/vendors/dropify/js/dropify.min.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/lobibox/Lobibox.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/jquery.validate.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/additional-methods.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/validate/messages_es.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/js/validate.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\losFranceses\resources\views/admin/products/show.blade.php ENDPATH**/ ?>