<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav navbar-toggler-right">
            @if (Auth::user()->role_id ==3)
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-shopping-cart">&nbsp</i>Mi Carrito
                        <span id="countCart" class="label label-danger">{{isset($cart) ? count($cart) :"0"}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <div class="container">
                            <h4>Lista de Compra</h4>
                            <hr>
                        </div>
                        @if (isset($cart))
                            @foreach ($cart as  $value)

                                    <div class="container">
                                        <p>
                                            <h5> <strong>{{ $value->name }} </strong> <small>$ {{$value->price}}</small></h5>
                                            <small class="pull-left">Cantidad : {{ $value->qty}}</small>
                                        </p>
                                    </div>

                            @endforeach
                        @endif

                        <br>
                        <div class="container">
                            <h4>{{isset($total) ? '$' : ''}}{{isset($total) ? $total : 'No hay Elementos'}}</h4>
                        </div>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="{{ route('games.cart-detail')}}"class="btn btn-primary btn-flat form-control" type="button" name="button">Ver detalle </a>
                        </li>
                    </ul>
                </li>

            @endif


            <!--li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success">4</span>
                </a>
                <!--ul class="dropdown-menu">
                    <!--li class="header">You have 4 messages</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <!--ul class="menu">
                            <li><!-- start message -->
                                <!--a href="#">
                                    <div class="pull-left">
                                        <img src="/images/user-default.png" class="img-circle" alt="User Image">
                                    </div>
                                    <h4>
                                        Support Team
                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                    </h4>
                                    <p>Why not buy a new awesome theme?</p>
                                </a>
                            </li>
                            <!-- end message -->
                        <!--/ul>
                    </li>
                    <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
            </li>
            <!-- Notifications: style can be found in dropdown.less -->
            <!--li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell-o"></i>
                    <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="header">You have 10 notifications</li>
                    <li>
                        <!-- inner menu: contains the actual data -->
                        <!--ul class="menu">
                            <li>
                                <a href="#">
                                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="footer"><a href="#">View all</a></li>
                </ul>
            </li>
            <!-- Tasks: style can be found in dropdown.less -->

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{Storage::url(Auth::user()->avatar)}}" class="user-image">
                    <span class="hidden-xs">{{ Auth::user()->firstname }}</span>
                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="{{Storage::url(Auth::user()->avatar)}}" class="img-circle">

                        <p>
                            {{ Auth::user()->firstname . ' ' .Auth::user()->lastname  }}
                            <small>Último Acceso : {{ Auth::user()->last_login_date ? (new DateTime(Auth::user()->last_login_date))->format('d-m-Y H:i:s') : 'nunca' }}</small>
                        </p>

                    </li>
                    <hr>
                    <!-- Menu Body -->

                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <div class="pull-left">
                            <!--a href="{{ route('profile') }}" class="btn btn-default btn-flat">Perfil</a-->
                        </div>
                        <div class="pull-right">
                            <form action="{{ route('logout') }}" method="POST">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-flat">Cerrar Sesión</button>
                            </form>
                        </div>

                    </li>
                </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <!--li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-question"></i></a>
            </li-->
        </ul>
    </div>
</nav>
