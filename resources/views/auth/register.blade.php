<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BEGAMES</title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/assets/custom.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="BEGAMES-bg-style">
<div class="text-center col-md-12">
    <a href="/">
        <img src="{{ url('assets/images/logo2.png') }}" alt="BEGAMES" class="img-fluid" style="max-width: 100%;height: auto">
    </a>
</div>
<div class="login-box">
    <div class="login-box">
        <div class="row">
            <div class="col-md-12">
                @include('template._success')
            </div>
        </div>
        <div class="login-box-title">
            <h3>Registro Usuarios</h3>
        </div>
        <div class="login-box-body">

            <div class="text-center">
                <p class="login-box-msg">Ingrese sus datos.</p>
            </div>
            <form action="{{ route('register') }}" method="POST">
                {!! csrf_field() !!}
                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error':'' }}">
                    <input type="email" class="form-control" placeholder="Email" name="email"
                           value="{{ old('email') ? old('email') :'' }}">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    {!! $errors->first('email','<span class="help-block">:message</span>') !!}
                </div>

                <div class="form-group has-feedback {{ $errors->has('firstname') ? 'has-error' : '' }}">
                    <input type="text" name="firstname" class="form-control" value="{{ old('firstname') }}"
                           placeholder="Ingrese Nombre">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('firstname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('firstname') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('lastname') ? 'has-error' : '' }}">
                    <input type="text" name="lastname" class="form-control" value="{{ old('lastname') }}"
                           placeholder="Ingrese Apellido Paterno">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('lastname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('lastname') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback {{ $errors->has('second_lastname') ? 'has-error' : '' }}">
                    <input type="text" name="second_lastname" class="form-control" value="{{ old('second_lastname') }}"
                           placeholder="Ingrese Apellido Materno">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('second_lastname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('second_lastname') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                    <input type="password" name="password" class="form-control"
                           placeholder="Ingrese Contraseña">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                      <input type="password" name="password_confirmation" class="form-control"
                             placeholder="Re-Ingrese Contraseña">
                      <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                      @if ($errors->has('password_confirmation'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password_confirmation') }}</strong>
                          </span>
                      @endif
                  </div>

                <div class="container-fluid">
                    <div class="col-xs-6">
                        <a href="{{ route('login') }}" class="">Ya posee cuenta?</a>
                    </div>
                    <div class="col-xs-6">
                        <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
