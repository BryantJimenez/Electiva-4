<?php $__env->startSection('title', 'Ingresar'); ?>

<?php $__env->startSection('content'); ?>

<div class="limiter">
  <div class="container-login100">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
      <form action="<?php echo e(route('login')); ?>" method="POST" id="formLogin" class="login100-form validate-form">
        <?php echo e(csrf_field()); ?>

        <span class="login100-form-title p-b-33">Sales</span>
        <div class="d-flex justify-content-center">
         <span class="login100-form-title p-b-33">Iniciar Sesión</span>
        </div>

        <?php echo $__env->make('admin.partials.errors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="wrap-input100">
          <input class="input100 <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="username" name="email" required value="<?php echo e(old('email')); ?>" placeholder="Correo Electrónico o Usuario" autofocus>
          <span class="focus-input100-1"></span>
          <span class="focus-input100-2"></span>
        </div>

        <div class="wrap-input100 rs1">
          <input class="input100 <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" type="password" required name="password" placeholder="Contraseña">
          <span class="focus-input100-1"></span>
          <span class="focus-input100-2"></span>
        </div>

        <div class="container-login100-form-btn m-t-20">
          <button class="login100-form-btn" action="login">Ingresar</button>
        </div>

        <div class="text-center p-t-45 p-b-4">
          <span class="txt1">Olvidaste tu contraseña?</span>
          <a href="<?php echo e(route('password.request')); ?>" class="txt2 hov1">Recuperala</a>
        </div>
      </form>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Ventas\resources\views/auth/login.blade.php ENDPATH**/ ?>