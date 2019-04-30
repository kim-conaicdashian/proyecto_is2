<div class="container">
    <a class="navbar-brand" href="/">KIM CONAICdashian</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="categoriaAsignada">{{$categoria_academico->nombre}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="evidencias">Subir Evidencias</a>
            </li>
            @if (auth()->user()->privilegio == 1)
                <li class="nav-item">
                    <a class="nav-link" href="categorias">Manejo de Categorias</a>
                </li>
                {{--
                    <li class="nav-item">
                        <a class="nav-link" href="academicos">Manejo de Academicos</a>
                    </li>
                    --}}
            @endif
        </ul>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-outline-info my-2 my-sm-0">Logout</button>
        </form>
    </div>
</div>