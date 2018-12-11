
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
        <li>
            <a href="#">
                <i class="fa fa-angle-right"></i>
                Sliders
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-angle-right"></i>
                Noticias
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-angle-right"></i>
                Profesores
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-angle-right"></i>
                Agenda
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-angle-right"></i>
                Actividades
            </a>
        </li>
        <li >
            <a href="#">
                <i class="fa fa-angle-right"></i>
                Galerias
            </a>
        </li>
    </ul>
</li>
<li>
    <a href="#">
        <i class="fa fa-gamepad"></i>
        <span>Paginas</span>
    </a>
</li>
