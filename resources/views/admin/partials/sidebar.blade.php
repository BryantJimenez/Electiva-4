<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="user-profile"> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><img src="{{ asset('/admins/img/users/'.Auth::user()->photo) }}" alt="Foto de perfil"/><span class="hide-menu" style="color:gray;">{{ Auth::user()->name }} </span></a>
                </li>
                <li class="nav-devider"></li>
                <li class="nav-small-cap">MÓDULOS</li>
                <li><a class="waves-effect waves-dark" href="{{ route('home') }}"><i class="mdi mdi-home"></i><span class="hide-menu" style="color:gray;">Inicio</span></a></li>

                <li><a class=" waves-effect waves-dark" href="{{ route('usuarios.index') }}" ><i class="fa fa-user-plus"></i><span class="hide-menu" style="color:gray;">Usuarios</span></a></li>

                <li><a class="waves-effect waves-dark" href="{{ route('categorias.index') }}" aria-expanded="false"><i class="fa fa-sort-alpha-asc" ></i><span class="hide-menu" style="color:gray;">Categorias</span></a></li>

                <li><a class="waves-effect waves-dark" href="{{ route('productos.index') }}"><i class="fa fa-product-hunt"></i><span class="hide-menu" style="color:gray;">Productos</span></a></li>

                <li><a class="waves-effect waves-dark" href="{{ route('clientes.index') }}" ><i class="fa fa-users"></i><span class="hide-menu" style="color:gray;">Clientes</span></a></li>

                <li><a class="waves-effect waves-dark" href="{{ route('proveedores.index') }}"><i class="fa fa-handshake-o"></i><span class="hide-menu" style="color:gray;"> Proveedores</span></a></li>

                <li><a class="waves-effect waves-dark" href="{{ route('ventas.index') }}"><i class="fa fa-truck"></i><span class="hide-menu" style="color:gray;"> Ventas</span></a></li>
            </ul>
        </nav>
    </div>
</aside>