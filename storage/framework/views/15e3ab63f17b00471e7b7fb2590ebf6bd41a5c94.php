<?php $__env->startSection('title', 'Inicio'); ?>
<?php $__env->startSection('page-title', 'Panel de Inicio'); ?>

<?php $__env->startSection('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/chartist-js/dist/chartist.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/chartist-js/dist/chartist-init.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">
	<div class="col-lg-12">
		<div class="row">
			<div class="col-lg-3">
				<div class="card bg-info text-white">
					<div class="card-body">
						<div class="d-flex">
							<div class="stats">
								<h1 class="text-white"><?php echo e($sale); ?></h1>
								<h6 class="text-white">Ventas</h6>
								<a href="<?php echo e(route('ventas.index')); ?>"><button class="btn btn-rounded btn-outline btn-light m-t-10 font-14">Más Info</button></a>
							</div>
							<div class="stats-icon text-right ml-auto"><i class="fa fa-dollar (alias) display-5 op-3 text-dark"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card bg-success text-white">
					<div class="card-body">
						<div class="d-flex">
							<div class="stats">
								<h1 class="text-white"><?php echo e($category); ?></h1>
								<h6 class="text-white">Categorías</h6>
								<?php if(admin()): ?>
									<a href="<?php echo e(route('categorias.index')); ?>"><button class="btn btn-rounded btn-outline btn-light m-t-10 font-14">Más Info</button></a>
								<?php endif; ?>
							</div>
							<div class="stats-icon text-right ml-auto"><i class="fa fa-tasks display-5 op-3 text-dark"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card bg-warning text-white">
					<div class="card-body">
						<div class="d-flex">
							<div class="stats">
								<h1 class="text-white"><?php echo e($customer); ?></h1>
								<h6 class="text-white">Clientes</h6>
								<a href="<?php echo e(route('clientes.index')); ?>"><button class="btn btn-rounded btn-outline btn-light m-t-10 font-14">Más Info</button></a>
							</div>
							<div class="stats-icon text-right ml-auto"><i class="fa fa-user-plus display-5 op-3 text-dark"></i></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="card bg-danger text-white">
					<div class="card-body">
						<div class="d-flex">
							<div class="stats">
								<h1 class="text-white"><?php echo e($products->count()); ?></h1>
								<h6 class="text-white">Productos</h6>
								<?php if(admin()): ?>
									<a href="<?php echo e(route('productos.index')); ?>"><button class="btn btn-rounded btn-outline btn-light m-t-10 font-14">Más Info</button></a>
								<?php endif; ?>
							</div>
							<div class="stats-icon text-right ml-auto"><i class="fa fa-shopping-cart display-5 op-3 text-dark"></i></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<figure class="highcharts-figure">
		    <div id="container-ventas"></div>
		</figure>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<figure class="highcharts-figure">
		    <div id="container-productos"></div>
		</figure>
	</div>
		<div class="col-md-6">
		<div class="card">
			<div class="card-body">
				<h3>Últimos productos</h3>
				
				<div class="table-responsive">
					<table id="tabla" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Codigo</th>
								<th>Nombre</th>
								<th>-</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $products->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($loop->iteration); ?></td>
								<td><?php echo e($product->cod); ?></td>
								<td>
									<span class="image-list">
										<a data-toggle="tooltip" data-placement="bottom" data-html="true" title="<img src='<?php echo e(asset('/admins/img/products/'.$product->image)); ?>' style='width: 150px; height: 150px;' ><br><b><?php echo e($product->name); ?></b>"><img src="<?php echo e(asset('/admins/img/products/'.$product->image)); ?>" class="img-circle" alt="Foto del Producto" width="40" height="40" /> <?php echo e($product->name); ?></a>
									</span>
								</td>
								<td>
									<span class="badge badge-success">$<?php echo e(number_format($product->sale_price)); ?></span>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script type="text/javascript" src="<?php echo e(asset('/admins/js/highcharts/highcharts.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/js/highcharts/series-label.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/js/highcharts/exporting.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/js/highcharts/export-data.js')); ?>"></script>
<script src="<?php echo e(asset('/admins/js/highcharts/accessibility.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('/admins/js/daterangepicker.min.js')); ?>"></script>

<script type="text/javascript">
	var total = <?php echo $total; ?>;
	var date = <?php echo $date; ?>;

	Highcharts.chart('container-ventas', {

    title: {
        text: 'Ventas por año y mes'
    },
    tooltip: {
        headerFormat: 'Fecha: <b>{point.x:.1f}</b><br>',
        pointFormat: 'Total: <strong>${point.y}</strong>',
        shared: true
    },

    subtitle: {
        text: 'Inventory'
    },

    yAxis: {
        title: {
            text: 'Total ($)'
        }
    },

    xAxis: {
        categories: date
    },

    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    series: [{
        name: 'Ventas ($)',
        data: total
    }],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 400
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});

Highcharts.chart('container-productos', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Productos más vendidos (%)'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true
        }
    },
    series: [{
        name: 'Ventas',
        colorByPoint: true,
        data: [<?php foreach($productVendidos as $p) { ?>
	        	{
		            name: '<?php echo $p->producto->name ?>',
		            y: <?php echo $p->count ?>
		        }, <?php } ?>]
    }]
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\losFranceses\resources\views/admin/home.blade.php ENDPATH**/ ?>