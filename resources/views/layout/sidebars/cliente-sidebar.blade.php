<li {{ (Request::is('management-users') ? 'class=active' : '') }}>
    <a href="{{ route('management.users') }}">
        <i class="fa fa-users"></i>
        <span>Gestión de Usuarios</span>
    </a>
</li>
