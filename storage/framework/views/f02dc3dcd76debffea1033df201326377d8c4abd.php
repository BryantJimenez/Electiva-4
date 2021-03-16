<?php $__env->startSection('title', 'Reportes'); ?>
<?php $__env->startSection('page-title', 'Reportes'); ?>

<?php $__env->startSection('links'); ?>
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/chartist-js/dist/chartist.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/chartist-js/dist/chartist-init.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/admins/vendors/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')); ?>">
<link rel="stylesheet" type="text/css"href="<?php echo e(asset('/admins/css/daterangepicker.css')); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">
	.highcharts-figure, .highcharts-data-table table {
	    min-width: auto; 
	    max-width:auto;
	    margin: 1em auto;
	}

	.highcharts-data-table table {
		font-family: Verdana, sans-serif;
		border-collapse: collapse;
		border: 1px solid #EBEBEB;
		margin: 10px auto;
		text-align: center;
		width: 100%;
		max-width: 500px;
	}
	.highcharts-data-table caption {
	    padding: 1em 0;
	    font-size: 1.2em;
	    color: #555;
	}
	.highcharts-data-table th {
		font-weight: 600;
	    padding: 0.5em;
	}
	.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
	    padding: 0.5em;
	}
	.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
	    background: #f8f8f8;
	}
	.highcharts-data-table tr:hover {
	    background: #f1f7ff;
	}
</style>

<div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
    <i class="fa fa-calendar"></i>&nbsp;
    <span></span> <i class="fa fa-caret-down"></i>
</div>
<div class="row">
	<div class="col-md-12">
		<figure class="highcharts-figure">
		    <div id="container-ventas"></div>
		</figure>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<figure class="highcharts-figure">
		    <div id="container-productos"></div>
		</figure>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<figure class="highcharts-figure">
		    <div id="container-vendedores"></div>
		</figure>
	</div>
	<div class="col-md-6">
		<figure class="highcharts-figure">
		    <div id="container-compradores"></div>
		</figure>
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

	$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function init(start, end) {
    	$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    function ajax(start, end) {
    	$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        $.ajax({
        	url: '<?php echo e(route('reportes.ajax.rango')); ?>',
        	type: 'POST',
        	dataType: 'JSON',
        	data: {_token: '<?php echo e(csrf_token()); ?>', desde : start.format('YYYY-MM-DD'),hasta: end.format('YYYY-MM-DD')},
        })
        .done(function(data) {
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
			        categories: data.date
			    },

			    legend: {
			        layout: 'vertical',
			        align: 'right',
			        verticalAlign: 'middle'
			    },

			    series: [{
			        name: 'Ventas ($)',
			        data: data.total
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
        })
        .fail(function() {
        	console.log("error");
        })
        .always(function() {
        	console.log("complete");
        });
        
    }



    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Hoy': [moment(), moment()],
           'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Últimos 7 días': [moment().subtract(6, 'days'), moment()],
           'Últimos 30 días': [moment().subtract(29, 'days'), moment()],
           'Este mes': [moment().startOf('month'), moment().endOf('month')],
           'Últimos mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, ajax);

    init(start, end);
   

});

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



Highcharts.chart('container-vendedores', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Total Vendedores'
    },
    // subtitle: {
    //     text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Wikipedia</a>'
    // },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -35,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'TOTAL ($)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Total ($): <b>${point.y:.2f}</b>'
    },
    series: [{
        name: 'Population',
        colorByPoint: true,
        data: [
        <?php foreach($maxVendedores as $v) { ?>
            ['<?php echo $v->vendedor->name?>', <?php echo $v->count ?>],
        <?php } ?>

            
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '${point.y:.2f}', // one decimal
            y: 20, // 10 pixels down from the top
            style: {
                fontSize: '15px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});

// Create the chart
Highcharts.chart('container-compradores', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'Total Compradores'
  },
  // subtitle: {
  //   text: 'Click the columns to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
  // },
  accessibility: {
    announceNewData: {
      enabled: true
    }
  },
  xAxis: {
    type: 'category'
  },
  yAxis: {
    title: {
      text: 'Total percent market share'
    }

  },
  legend: {
    enabled: false
  },
  plotOptions: {
    series: {
      borderWidth: 0,
      dataLabels: {
        enabled: true,
        format: '${point.y:.1f}'
      }
    }
  },

  tooltip: {
    headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
    pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>${point.y:.2f}</b><br/>'
  },

  series: [
    {
      name: "Total($)",
      colorByPoint: true,
      data: [
        <?php foreach($maxCompradores as $c){ ?>
        {
          name: "<?php echo $c->cliente->name ?>",
          y: <?php echo $c->count ?>,
          drilldown: null
        },
        <?php } ?>
      ]
    }
  ],
  
});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\losFranceses\resources\views/admin/ventas/reportes/index.blade.php ENDPATH**/ ?>