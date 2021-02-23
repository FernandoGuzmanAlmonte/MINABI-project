<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">
            <img src={{ asset('images/logotipo.png') }} width="30" height="43" class="d-inline-block align-center" alt="">
            <b> MINABI </b>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <li class="nav-item dropdown {{ request()->routeIs('provider.*') || request()->routeIs('employee.*') ? 'active' : ''}}">
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
                    </div>
                </li>
                <a class="nav-item nav-link disabled" href="/">
                    Cintilla
                </a>
                <a class="nav-item nav-link {{ request()->routeIs('coil.*') ? 'active' : ''}}" href="{{ route('coil.index') }}">
                    Bobinas
                </a>
                <a class="nav-item nav-link {{ request()->routeIs('coilProduct.*') ? 'active' : ''}}" href="{{ route('coilProduct.index') }}">
                    Rollos
                </a>
                <a class="nav-item nav-link {{ request()->routeIs('bag.*') ? 'active' : ''}}" href="{{ route('ribbonProduct.index') }}">
                    Bolsas
                </a>
                <a class="nav-item nav-link disabled" href="/">
                    Rollos Cintilla
                </a>
            </div>
        </div>
    </nav>
</header>    