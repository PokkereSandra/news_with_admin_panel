<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{asset('/admin')}}">Administrācija</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>

    <!-- Navbar-->
    <ul class="navbar-nav ms-auto me-3 me-lg-4">
        <a href="{{asset('/')}}" class="link-to-page">Uz ziņu lapu</a>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
               aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <li>
                        <button class="dropdown-item" type="submit">Logout</button>
                    </li>
                </form>
            </ul>
        </li>
    </ul>
</nav>
