<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="home">
            <img src={{ asset('images/logotipo.png') }} width="30" height="43" class="d-inline-block align-center" alt="">
            <b> MINABI </b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <li class="nav-item dropdown {{ request()->routeIs('employee.*', 'coilType.*', 'provider.*') ? 'active' : ''}}">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Catálogos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item {{ request()->routeIs('provider.*') ? 'active' : ''}}" href="{{ route('provider.index') }}">
                            Proveedores
                        </a>
                        <a class="dropdown-item {{ request()->routeIs('employee.*') ? 'active' : ''}}" href="{{ route('employee.index') }}">
                            Empleados
                        </a>
                        <a class="dropdown-item {{ request()->routeIs('coilType.*') ? 'active' : ''}}" href="{{ route('coilType.index') }}">
                            Medidas de Bobina
                        </a>
                        <a class="dropdown-item {{ request()->routeIs('user.*') ? 'active' : ''}}" href="{{ route('user.index') }}">
                            Usuarios
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown {{ request()->routeIs('whiteCoil.*', 'whiteRibbon.*', 'whiteCoilProduct.*') ? 'active' : ''}}">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cinta Blanca
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item {{ request()->routeIs('whiteCoil.*') ? 'active' : ''}}" href="{{ route('whiteCoil.index') }}">
                            Bobina
                        </a>
                        <a class="dropdown-item {{ request()->routeIs('whiteCoilProduct.*') ? 'active' : ''}}" href="{{ route('whiteCoilProduct.index') }}">
                            Rollos
                        </a>
                    </div>
                </li>
                <a class="nav-item nav-link {{ request()->routeIs('coil.*') ? 'active' : ''}}" href="{{ route('coil.index') }}">
                    Bobinas
                </a>
                <a class="nav-item nav-link {{ request()->routeIs('coilProduct.*') ? 'active' : ''}}" href="{{ route('coilProduct.index') }}">
                    Rollos
                </a>
                <a class="nav-item nav-link {{ request()->routeIs('bag.*') ? 'active' : ''}}" href="{{ route('ribbonProduct.index') }}">
                    Bolsas
                </a>
               
            </div>
            <form action="logout" method="POST" class="ml-lg-auto text-md-left navbar-nav">
                @csrf
                <a href="#" class="nav-item nav-link" onclick="this.closest('form').submit()">Cerrar sesion</a>
            </form>      
        </div>
    </nav>
</header>    