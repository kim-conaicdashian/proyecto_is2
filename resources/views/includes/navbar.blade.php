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
                    <a class="nav-link" id="home" href="categoriaAsignada" disabled="">Mi categoría</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="evidencias" href="evidencias" disabled="">Subir Evidencias</a>
                </li>
            @endif
            @if (auth()->user()->privilegio == 1)
                <li class="nav-item">
                    <a class="nav-link" id="categorias" href="categorias" disabled="">Manejo de Categorías</a>
                </li>
                {{--
                    <li class="nav-item">
                        <a class="nav-link" href="academicos">Manejo de Academicos</a>
                    </li>
                    --}}
            @endif
        </ul>
        <a class="nav-link" href="#" >
            {{ auth()->user()->nombre }} 
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-outline-info my-2 my-sm-0">Logout</button>
        </form>
    </div>
</div>

<script>


</script>