<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-profile"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><img src="<?php echo e(asset('/admins/img/users/'.Auth::user()->photo)); ?>" alt="Foto de perfil"/><span class="hide-menu" style="color:gray;"><?php echo e(Auth::user()->name." ".Auth::user()->lastname); ?> </span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sección</a></li>
                    </ul>
                </li>
                <li class="nav-devider"></li>
                <li class="nav-small-cap">MÓDULOS</li>
                <li><a class="waves-effect waves-dark" href="<?php echo e(route('home')); ?>"><i class="mdi mdi-home"></i><span class="hide-menu" style="color:gray;">Inicio</span></a></li>

                <li><a class=" waves-effect waves-dark" href="<?php echo e(route('usuarios.index')); ?>" ><i class="fa fa-user-plus"></i><span class="hide-menu" style="color:gray;">Usuarios</span></a></li>

                <li><a class="waves-effect waves-dark" href="<?php echo e(route('clientes.index')); ?>" ><i class="fa fa-users"></i><span class="hide-menu" style="color:gray;">Clientes</span></a></li>

                <li><a class="waves-effect waves-dark" href="<?php echo e(route('presupuestos.index')); ?>" aria-expanded="false"><i class="fa fa-calculator" ></i><span class="hide-menu" style="color:gray;">Presupuesto</span></a></li>

                <li><a class="waves-effect waves-dark" href="<?php echo e(route('trabajos.index')); ?>"><i class="fa fa-gears (alias)"></i><span class="hide-menu" style="color:gray;">Trabajos</span></a></li>

                <li><a class="waves-effect waves-dark" href="<?php echo e(route('agendas.index')); ?>"><i class="fa fa-calendar"></i><span class="hide-menu" style="color:gray;">Agenda</span></a></li>

                <li><a class="waves-effect waves-dark" href="<?php echo e(route('vehiculos.index')); ?>"><i class="fa fa-car"></i><span class="hide-menu" style="color:gray;">Vehículos</span></a></li>

                <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-building"></i><span class="hide-menu" style="color:gray;">Compañías de Seguros</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo e(route('companias.index')); ?>">Compañias</a></li>
                        <li><a href="<?php echo e(route('contactos.index')); ?>">Contactos</a></li>
                        <li><a href="<?php echo e(route('verificadores.index')); ?>">Inspectores</a></li>
                    </ul>
                </li>

                <li><a class="waves-effect waves-dark" href="<?php echo e(route('talleres.index')); ?>"><i class="fa fa-university"></i><span class="hide-menu" style="color:gray;">Talleres</span></a></li>

                <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="fa fa-map"></i><span class="hide-menu" style="color:gray;">Provincias, Localidades y Barrios</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo e(route('provincias.index')); ?>">Provincias</a></li>
                        <li><a href="<?php echo e(route('localidades.index')); ?>">Localidades</a></li>
                        <li><a href="<?php echo e(route('distritos.index')); ?>">Barrios</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside><?php /**PATH C:\xampp\htdocs\Sistema-Cucar\resources\views/admin/partials/sidebar.blade.php ENDPATH**/ ?>