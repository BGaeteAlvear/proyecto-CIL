@extends('template.base')

@section('content-title', 'Perfil')

@section('content-subtitle', 'Username')

@section('breadcrumb')
    <li><a href="{{ route('profile') }}">Perfil</a></li>
    <li class="active">username</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#data" data-toggle="tab" aria-expanded="false">Mis Datos</a></li>
                    <li class=""><a href="#change-password" data-toggle="tab" aria-expanded="false">Cambiar Contraseña</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="data">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="avatar" class="col-md-3 control-label">Avatar</label>
                                <div class="col-md-9">
                                    <div class="image-avatar">
                                        <img id="image-avatar" src="/images/user-default.png">
                                    </div>
                                    <input type="file" name="avatar" onchange="loadAvatar();" id="file" class="inputfile" accept="image/x-png,image/gif,image/jpeg" />
                                    <label for="file">Seleccione un avatar</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-3 control-label">Nombre</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="col-md-3 control-label">Apellido Paterno</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="lastname" placeholder="Apellido Paterno">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="second_lastname" class="col-md-3 control-label">Apellido Materno</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="second_lastname" placeholder="Apellido Materno">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-3 control-label">Email</label>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-primary btn-flat">Actualizar Datos</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane" id="change-password">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label for="actual" class="col-md-3 control-label">Contraseña Actual</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="actual" placeholder="Contraseña Actual">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nuevo" class="col-md-3 control-label">Nueva Contraseña</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="nuevo" placeholder="Nueva Contraseña">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="repite" class="col-md-3 control-label">Repita Nueva Contraseña</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="repite" placeholder="Repita Nueva Contraseña">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-primary btn-flat">Cambiar Contraseña</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="/images/user-default.png"
                         alt="User profile picture">

                    <h3 class="profile-username text-center">username</h3>

                    <p class="text-muted text-center">role</p>
                    <p class="text-muted text-center">last login</p>

                </div>
                <!-- /.box-body -->
            </div>
        </div>

    </div>


@endsection

@section('styles')
    <style>
        .image-avatar{
            width: 147px;
            border: 1px solid #c5c5c5;
            padding: 5px;
            margin-bottom: 10px;
        }
        .image-avatar img{
            display: block;
            width: 135px;
            height: 135px;
            object-fit: cover;
        }
        .inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        .inputfile + label {
            font-size: 1.25em;
            font-weight: 700;
            color: white;
            background-color: #3c8dbc;
            border-color: #367fa9;
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
        }

        .inputfile:focus + label,
        .inputfile + label:hover {
            background-color: #204d74;
            border-color: #122b40;
        }
    </style>
@endsection

@section('scripts')
    <script>

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image-avatar').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#file").change(function(){
            readURL(this);
        });

    </script>
@endsection