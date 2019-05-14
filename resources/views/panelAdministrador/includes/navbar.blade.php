<div class="container">
    <a style="color:white;" class="navbar-brand" href="/">KIM CONAICdashian</a>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
    </button>

    <!-- Top Navigation: Left Menu -->
    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li class="nav-item">
            <a style="color:white;" class="nav-link" href="/"> Inicio</a>
        </li>
        @if (auth()->user()->categoria)
            <li class="nav-item">
                <a style="color:white;" class="nav-link" id="home" href="/categoriaAsignada" >Mi categoría</a>
            </li>
            <li class="nav-item">
                <a style="color:white;" class="nav-link" id="evidencias" href="/evidencias" >Subir Evidencias</a>
            </li>
        @endif
    </ul>

    <!-- Top Navigation: Right Menu -->
    <ul class="nav navbar-right navbar-top-links">



        <li class="dropdown">
            <a style="color:white;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ auth()->user()->nombre }} <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <a class="dropdown-item" style = "color:black !important;" href="{{ route('academico.editPerfil', auth()->user()->id) }}">Editar Perfil</a>
                @if (auth()->user()->privilegio == 1)
                    <a style="color:black !important;" class="dropdown-item" id="categorias" href="/panelAdministrador" disabled="">Panel de Categorías</a>
                    <a style="color:black !important;" class="dropdown-item" href="/academicos">Manejo de Académicos</a>
                @endif
                <li class="divider"></li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item">Cerrar sesión</button>
                </form>
            </ul>
        </li>
    </ul>
</div>


    <!-- Sidebar -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">

            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
                </li>
                <li>
                    <a href="#" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a href="#">Third Level <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>

