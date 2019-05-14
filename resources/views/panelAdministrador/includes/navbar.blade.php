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
        <li class="dropdown navbar-inverse">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><b class="caret"></b></a>
            <ul class="dropdown-menu dropdown-alerts">
                <li>
                    <a href="#">
                        <div>
                            <i class="fa fa-comment fa-fw"></i> New Comment
                            <span class="pull-right text-muted small">4 minutes ago</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="text-center" href="#">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </li>
            </ul>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> secondtruth <b class="caret"></b>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
        </li>
    </ul>



    <!-- Sidebar -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">

            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-xs btn-block" type="button">
                                        Recomendaciones
                                    </button>
                                </span>
                            
                        </div> 
                        <br>
                        <div class="input-group custom-search-form">
    
                                <span class="input-group-btn">
                                    <button class="btn btn-primary btn-xs btn-block" type="button">
                                        Planes de acción
                                    </button>
                                </span>
                        </div>
                </li>
                
                @if($categorias->count() > 0)
                <br>
                    <li>
                        <p style="text-align: center;"> Categorías: </p>
                    </li>
                    @foreach ($categorias as $categoria)
                        <li>
                            <a href="{{route('categorias.show',$categoria->id)}}" class="active"><i class="fa fa-dashboard fa-fw"></i> {{$categoria->nombre}}</a>
                        </li>
                    @endforeach
                @else
                <br>
                    <li>
                        <p style="text-align: center;">No hay categoías disponibles</p>
                    </li>
                @endif
                
            </ul>

        </div>
    </div>