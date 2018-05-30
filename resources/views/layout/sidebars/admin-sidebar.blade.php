
<li {{ (Request::is('management-users') ? 'class=active' : '') }}>
    <a href="{{ route('management.users') }}">
        <i class="fa fa-users"></i>
        <span>Gestión de Usuarios</span>
    </a>
</li>
<li class="treeview {{ (Request::is('config/*') ? 'active' : '') }}">
    <a href="#">
        <i class="fa fa-gears"></i> <span>Gestión y Configuración</span>
        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
    </a>
    <ul class="treeview-menu">
        <li {{ (Request::is('config/categories') ? 'class=active' : '') }} >
            <a href="{{ route('categories') }}">
                <i class="fa fa-angle-right"></i>
                Categorías de Juegos
            </a>
        </li>
        <li {{ (Request::is('config/plataforms') ? 'class=active' : '') }} >
            <a href="{{ route('plataforms') }}">
                <i class="fa fa-angle-right"></i>
                Plataformas
            </a>
        </li>
        <li {{ (Request::is('config/game-types') ? 'class=active' : '') }} >
            <a href="{{ route('game-types') }}">
                <i class="fa fa-angle-right"></i>
                Tipos de Juegos
            </a>
        </li>
        <li {{ (Request::is('config/companies') ? 'class=active' : '') }} >
            <a href="{{ route('companies') }}">
                <i class="fa fa-angle-right"></i>
                Compañias de Juegos
            </a>
        </li>
        <li {{ (Request::is('config/media-types') ? 'class=active' : '') }} >
            <a href="{{ route('media-types') }}">
                <i class="fa fa-angle-right"></i>
                Tipos de Recuros Media
            </a>
        </li>
        <li {{ (Request::is('config/games') ? 'class=active' : '') }} >
            <a href="{{ route('games') }}">
                <i class="fa fa-angle-right"></i>
                Juegos
            </a>
        </li>
    </ul>
</li>
<li {{ (Request::is('management-games') ? 'class=active' : '') }}>
    <a href="{{ route('management.games') }}">
        <i class="fa fa-gamepad"></i>
        <span>Juegos</span>
    </a>
</li>
