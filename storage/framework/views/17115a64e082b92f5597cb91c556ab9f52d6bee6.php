<?php $__env->startSection('title', '404'); ?>

<?php $__env->startSection('content'); ?>

<div class="error-body text-center">
	<h1>404</h1>
	<h3 class="text-uppercase">Página No Encontrada !</h3>
	<p class="text-muted m-t-30 m-b-30">LO QUE ESTAS BUSCANDO NO LO ENCONTRARAS AQUÍ</p>
	<a href="<?php echo e(route('home')); ?>" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Volver al Inicio</a>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ventas\resources\views/errors/404.blade.php ENDPATH**/ ?>