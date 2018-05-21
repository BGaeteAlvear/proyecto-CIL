<li {{ (Request::is('management-users') ? 'class=active' : '') }}>
    <a href="{{ route('management.users') }}">
        <i class="fa fa-users"></i>
        <span>Gestión de Usuarios</span>
    </a>
</li>
<li {{ (Request::is('management-games') ? 'class=active' : '') }}>
    <a href="{{ route('management.games') }}">
        <i class="fa fa-gamepad"></i>
        <span>Juegos</span>
    </a>
</li>
