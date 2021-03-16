<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <div class="navbar-header d-flex justify-content-center">
            <a class="navbar-brand" href="<?php echo e(route('home')); ?>">
                <b style="color: gray;">Los Franceses</b>
            </a>
        </div>
        <div class="navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
            </ul>
            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="notificationsButton"> <i class="fa fa-bell"></i>
                        <div class="notify d-none">
                            <span class="heartbit"></span>
                            <span class="point"></span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                        <ul>
                            <li>
                                <div class="drop-title">Notificaciones</div>
                            </li>
                            <li>
                                <div class="message-center" id="notifications"></div>
                            </li>
                            <li class="allNotifications">
                                <a class="nav-link text-center" href="<?php echo e(route('notificaciones.index')); ?>">
                                    <strong>Todas Las Notificaciones</strong> <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
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
                            <li><a href="<?php echo e(route('usuarios.profile')); ?>"><i class="fa fa-id-card"></i> Perfil</a></li>
                            <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> Cerrar Sesión</a></li>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                            </form>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header><?php /**PATH C:\xampp\htdocs\Sistema-Cucar\resources\views/admin/partials/header.blade.php ENDPATH**/ ?>