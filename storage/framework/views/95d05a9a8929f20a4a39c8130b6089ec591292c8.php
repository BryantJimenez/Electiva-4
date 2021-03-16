<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ticket <?php echo e($venta->codigo); ?></title>
</head>
<body>
	<table style="font-size:13px; text-align:center">
		<tr>
			<td style="width:260px;">
				<div>
					Fecha: <?php echo e($venta->created_at->format('d-m-Y')); ?>


					<br><br>
					Inventory System
					
					<br>
					NIT: 71.759.963-9

					<br>
					Dirección: Calle 44B 92-11

					<br>
					Teléfono: 300 786 52 49

					<br>
					FACTURA N.<?php echo e($venta->codigo); ?>

					<br><br>					
					Cliente: <?php echo e($venta->cliente->name); ?>

					<br>
					Vendedor: <?php echo e($venta->vendedor->name); ?>

					<br>
				</div>
			</td>
		</tr>
	</table>
	<br>
	<table style="font-size:13px;">
		<?php $__currentLoopData = $venta->productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td style="width:260px; text-align: center;">
				<?php echo e($p->producto->name); ?><br> $ <?php echo e($p->precio_unitario / $p->cantidad); ?> Und * <?php echo e($p->cantidad); ?>  = $ <?php echo e($p->precio_unitario); ?><br>
				</td>
			</tr>
			
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</table>
	<br>
	<table style="font-size:13px; text-align:right">

	<tr>
	
		<td style="width:80px;">
			 NETO: 
		</td>

		<td style="width:80px;">
			$ <?php echo e(number_format($venta->neto, 2)); ?>

		</td>

	</tr>

	<tr>
	
		<td style="width:80px;">
			 IMPUESTO: 
		</td>

		<td style="width:80px;">
			$ <?php echo e(number_format($venta->impuestos, 2)); ?>

		</td>

	</tr>

	<tr>
	
		<td style="width:160px;">
			 --------------------------
		</td>

	</tr>

	<tr>
	
		<td style="width:80px;">
			 TOTAL: 
		</td>

		<td style="width:80px;">
			$ <?php echo e(number_format($venta->total, 2)); ?>

		</td>

	</tr>

	<tr>
	
		<td style="width:210px;  text-align: center;">
			<br>
			<br>
			Muchas gracias por su compra
		</td>

	</tr>

</table>
</body>
</html><?php /**PATH C:\xampp\htdocs\losFranceses\resources\views/admin/ventas/pdf/ticket.blade.php ENDPATH**/ ?>