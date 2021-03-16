<?php $__env->startSection('title', 'Lista de Ventas'); ?>
<?php $__env->startSection('page-title', 'Lista de Ventas'); ?>

<?php $__env->startSection('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/lobibox/Lobibox.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<li class="breadcrumb-item">Ventas</li>
<li class="breadcrumb-item active">Lista</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="row">
				<div class="col-lg-3">
					<a href="<?php echo e(route('ventas.create')); ?>"><button type="button" class="btn btn-info">Crear Venta</button></a>
				</div>
				<div class="col-lg-3">
				</div>
				<div class="col-lg-3">
				</div>
				<div class="col-lg-3">
					<select class="form-control">
						<option value="">Rango de Fecha</option>
					</select>
				</div>
				</div>
				<div class="table-responsive">
					<table id="tabla" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>N° Factura</th>
								<th>Cliente</th>
								<th>Vendedor</th>
								<th>Forma de Pago</th>
								<th>Neto</th>
								<th>Total</th>
								<th>Fecha</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $ventas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td class="text-center"><?php echo e($loop->iteration); ?></td>
								<td class="text-center"><?php echo e($v->codigo); ?></td>
								<td class="text-center"><?php echo e($v->cliente->name); ?></td>
								<td class="text-center"><?php echo e($v->vendedor->name); ?></td>
								<td class="text-center"><?php echo e($v->metodo_pago); ?></td>
								<td class="text-center"><?php echo e($v->neto); ?>$</td>
								<td class="text-center"><?php echo e($v->total); ?></td>
								<td class="text-center"><?php echo e($v->created_at->format('d-m-Y')); ?><br><strong><small>(<?php echo e($v->created_at->diffForHumans()); ?>)</small></strong></td>
								<td class="d-flex">
									
									<a class="btn btn-danger btn-circle btn-sm modalDelete" data-url="<?php echo e(route('ventas.destroy',$v->id)); ?>" data-placement="bottom" title="Eliminar" data-codigo="<?php echo e($v->codigo); ?>" data-id="<?php echo e($v->id); ?>"><i class="mdi mdi-delete-empty"></i></a>&nbsp;&nbsp;
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

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-bold" id="exampleModalLabel">ELIMINAR VENTA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="form_delete">
        	<?php echo csrf_field(); ?>
        	<?php echo method_field('DELETE'); ?>
        	<input type="hidden" name="id" id="id_venta">
        	<h2>¿Desea Borrar la venta <strong id="codigo_venta"></strong>?</h2>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger">Si, Borrar la venta.</button>
       </form>
      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('/admins/vendors/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/vendors/lobibox/Lobibox.js')); ?>"></script>
<script type="text/javascript">
	$(".modalDelete").click(function(event) {
		let id = $(this).data('id');
		    url = $(this).data('url');
		    codigo = $(this).data('codigo');  
		$("#form_delete").attr('action',url);
		$("#codigo_venta").text(codigo);
		$("#id_venta").val(id);
		$("#deleteModal").modal('show');
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USUARIO\Desktop\electiva-4\resources\views/admin/ventas/index.blade.php ENDPATH**/ ?>