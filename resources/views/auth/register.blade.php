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
<div class="login-boxer">
    <div class="text-center">
        <a href="/">
             <img src="{{ url('assets/images/logo.png') }}" alt="BEGAMES" width="70%">
        </a>
    </div>
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
