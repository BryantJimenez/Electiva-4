<?php $__env->startSection('title', 'Lista de Categorías'); ?>
<?php $__env->startSection('page-title', 'Lista de Categorías'); ?>

<?php $__env->startSection('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/lobibox/Lobibox.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/dropify/css/dropify.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item">Categorías</li>
<li class="breadcrumb-item active">Lista</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Agregar Categoría</button>
				<div class="table-responsive">
					<table id="tabla" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre</th>
								<th>Descripción</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($num++); ?></td>
								<td><?php echo e($category->name); ?></td>
								<td><?php echo e($category->description); ?></td>
								<td class="d-flex">
									<a class="btn btn-info btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar" href="<?php echo e(route('categorias.edit', ['slug' => $category->slug])); ?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
								<button type="button" class="btn btn-danger btn-circle btn-sm" data-toggle="tooltip" data-placement="bottom" title="Eliminar" onclick="deleteCategory('<?php echo e($category->slug); ?>','<?php echo e(route('categorias.delete',$category->slug)); ?>')"><i class="fa fa-trash"></i></button>
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

<div class="modal fade" id="deleteCategory" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">¿Estás seguro de que quieres eliminar esta categoría?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<form action="" method="POST" id="formDeleteCategory">
					<?php echo csrf_field(); ?>
					<?php echo method_field('DELETE'); ?>
					<button type="submit" class="btn btn-primary">Eliminar</button>
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
				<h4 class="modal-title" id="exampleModalLabel1">Agregar Categoría</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<form action="<?php echo e(route('categorias.store')); ?>" method="POST" class="form" id="formCategory">
					<?php echo csrf_field(); ?>

					<?php echo $__env->make('admin.partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

					<div class="row">

						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-pencil-square-o"></i></div>
								<input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="Ingresar Nombre">
							</div>
						</div>


						<div class="form-group col-lg-12 col-md-12 col-12">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-align-left"></i></div>
								<input type="text" class="form-control" required name="description" value="<?php echo e(old('description')); ?>" autocomplete="nope" placeholder="Ingresar Descripción">
							</div>
						</div>

					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary"  action="category">Guardar Categoría</button>
					</div>
				</form>
			</div>	
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ventas\resources\views/admin/categories/index.blade.php ENDPATH**/ ?>