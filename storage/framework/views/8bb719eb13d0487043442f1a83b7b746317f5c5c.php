<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header d-flex justify-content-center">
            <a class="navbar-brand nav-small-cap" href="<?php echo e(route('home')); ?>">
                <b style="color: gray;">Sales</b>
            </a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <!-- shopping cart -->
                <li class="nav-item dropdown">
                    <a class="nav-link  waves-effect waves-dark" href="/hola"><i class="fa fa-cart-arrow-down fa-lg" aria-hidden="true"></i> <span class="badge badge-danger">0</span></a>
                    
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo e(asset('/admins/img/users/'.Auth::user()->photo)); ?>" alt="Foto de usuario" class="profile-pic" /></a>
                    <div class="dropdown-menu dropdown-menu-right animated flipInY">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img"><img src="<?php echo e(asset('/admins/img/users/'.Auth::user()->photo)); ?>" alt="user"></div>
                                    <div class="u-text">
                                        <h4><?php echo e(Auth::user()->name." ".Auth::user()->lastname); ?></h4>
                                        <p class="text-muted"><?php echo userState(Auth::user()->state); ?></p>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            
                            <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i><span style="color:gray;">Cerrar Sesión</span></a></li>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header><?php /**PATH C:\xampp\htdocs\Ventas\resources\views/admin/partials/header.blade.php ENDPATH**/ ?>