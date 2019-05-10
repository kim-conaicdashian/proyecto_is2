<div class="container">
    <a class="navbar-brand" href="/">KIM CONAICdashian</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Inicio</a>
            </li>
            @if (auth()->user()->categoria)
                <li class="nav-item">
                    <a class="nav-link" id="home" href="/categoriaAsignada" disabled="">Mi categoría</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="evidencias" href="/evidencias" disabled="">Subir Evidencias</a>
                </li>
            @endif
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ auth()->user()->nombre }} 
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('academico.editPerfil', auth()->user()->id) }}">Editar Perfil</a>
                    @if (auth()->user()->privilegio == 1)

                            <a class="dropdown-item" id="categorias" href="/categorias" disabled="">Manejo de Categorías</a>


                            <a class="dropdown-item" href="/academicos">Manejo de Académicos</a>

                    @endif
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item">Cerrar sesión</button>
                    </form>
                </div>
            </li>
        </ul>
        
    </div>
</div>
