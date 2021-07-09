<ul id="sidenav-left" class="sidenav">
    <li><div class="user-view dark-primary-color">
            <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
            <a href="#name"><span class="white-text name">{{ auth()->user()->persona->nombre }}</span></a>
            <a href="#email"><span class="white-text email">{{ auth()->user()->email }}</span></a>
        </div>
    </li>
    <li><a class="subheader">Administración</a></li>
    <li><a class="waves-effect" href="{{ route('usuarios.index') }}">Gestionar Usuarios<i class="material-icons">apps</i></a></li>
    <li><a class="waves-effect" href="{{ route('generos.index') }}">Gestionar Géneros <i class="material-icons">apps</i></a></li>
    <li><a class="waves-effect" href="{{ route('libros.index') }}">Gestionar Libros <i class="material-icons">apps</i></a></li>
    <li><a class="waves-effect" href="{{ route('peliculas.index') }}">Gestionar Películas <i class="material-icons">apps</i></a></li>
    <li><a class="waves-effect" href="{{ route('clientes.index') }}">Gestionar Clientes <i class="material-icons">apps</i></a></li>
    <li><a class="waves-effect" href="{{ route('alquileres.index') }}">Gestionar Alquileres <i class="material-icons">apps</i></a></li>
</ul>
