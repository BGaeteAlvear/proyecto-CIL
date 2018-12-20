@extends('template.base')

@section('content-title', 'Gestión de Juegos')

@section('content-subtitle', 'Panel de Juegos')

@section('breadcrumb')
    <li class="active">Gestión de Juegos</li>
@endsection

@section('content')


<div class="box-body">
                <div class="form-group">
                  <label for="inputEmail">Email </label>
                  <input type="email" class="form-control" id="inputEmail" placeholder="ingrese su email">
                </div>
                <div class="form-group">
                  <label for="inputSlider">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Ingrese contraseña">
                </div>
                <div class="form-group">
                  <label for="inputCarga">File input</label>
                  <input type="file" id="inputCarga">

                  <p class="help-block">Seleccione aquí su archivo</p>
                </div>
                <div class="checkbox">
                  <label>
                    
                  </label>
                </div>
              </div>



@endsection

@section('styles')

@endsection

@section('scripts')

@endsection
