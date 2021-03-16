<!DOCTYPE html>
<html lang="es" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	
	<link rel="icon" href="<?php echo e(asset('/admins/img/favicon.ico')); ?>" type="image/x-icon" />
	<title><?php echo $__env->yieldContent('title'); ?></title>

	<link href="<?php echo e(asset('/admins/css/bootstrap/bootstrap.min.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('/admins/css/style.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(asset('/admins/vendors/mcustomscrollbar/jquery.mCustomScrollbar.min.css')); ?>" rel="stylesheet">
	
	<?php echo $__env->yieldContent('links'); ?>
	<link href="<?php echo e(asset('/admins/css/colors/blue-dark.css')); ?>" id="theme" rel="stylesheet" type="text/css">
</head>
<body class="fix-header fix-sidebar card-no-border">

	<?php echo $__env->make('auth.partials.loader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
	<div id="main-wrapper">
		
		<?php echo $__env->make('admin.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php echo $__env->make('admin.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
		<div class="page-wrapper">
			<div class="container-fluid r-aside">

				<div class="row page-titles">
					<div class="col-md-5 align-self-center">
						<h3 class="text-themecolor"><?php echo $__env->yieldContent('page-title'); ?></h3>
					</div>
					<div class="col-md-7 align-self-center">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Inicio</a></li>
							<?php echo $__env->yieldContent('breadcrumb'); ?>
						</ol>
					</div>
					
				</div>

				<?php echo $__env->yieldContent('content'); ?>

				

			</div>

			<?php echo $__env->make('admin.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		</div>
	</div>

	<script src="<?php echo e(asset('/admins/js/jquery/jquery.min.js')); ?>"></script>
	<script src="<?php echo e(asset('/admins/js/bootstrap/popper.min.js')); ?>"></script>
	<script src="<?php echo e(asset('/admins/js/bootstrap/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('/admins/vendors/mcustomscrollbar/jquery.mCustomScrollbar.concat.min.js')); ?>"></script>
	<script src="<?php echo e(asset('/admins/js/waves.js')); ?>"></script>
	<script src="<?php echo e(asset('/admins/js/sidebarmenu.js')); ?>"></script>
	<script src="<?php echo e(asset('/admins/vendors/moment/moment.js')); ?>"></script>
	<?php echo $__env->yieldContent('script'); ?>
	<script src="<?php echo e(asset('/admins/vendors/fullcalendar/es.js')); ?>"></script>
	<script src="<?php echo e(asset('/admins/js/custom.min.js')); ?>"></script>
	<?php echo $__env->make('admin.partials.notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\Sistema-Cucar\resources\views/layouts/admin.blade.php ENDPATH**/ ?>