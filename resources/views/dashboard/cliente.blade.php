@extends('template.base')

@section('content-title', '')

@section('content-subtitle', '' )

@section('breadcrumb')
<li class="active">Inicio</li>
@endsection

@section('content')
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li class="active"><a href="#"><b class="titulo-nav">Inicio</b></a></li>
            @foreach ($plataforms as $plataform)
            <li><a href="#" class="item-nav">{{$plataform->name}}</a></li>
            @endforeach

        </ul>
        <form class="navbar-form navbar-right" action="/action_page.php">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Buscar">
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
        </form>
    </div>
</nav>
<div class="tab-content title-section">
    <div>
        <b>LOS MAS VENDIDOS</b>
    </div>
</div>


<div id="exTab2" class="container-fluid item-pills">
    <ul class="nav nav-tabs">
        @foreach ($plataforms as $plataform)
        @if($plataform[0])
            <li><a href="#{{$plataform->id}}" aria-expanded="true" data-toggle="tab">{{$plataform->name}}</a></li>
        @endif
        <li><a href="#{{$plataform->id}}" data-toggle="tab">{{$plataform->name}}</a></li>
        @endforeach
    </ul>

    <div class="tab-content">
        @foreach ($plataforms as $plataform)
        <div class="tab-pane active" id="{{$plataform->id}}">
            <h3>{{$plataform->name}}</h3>
            <div class="col-lg-12">
                <div class="row">
                    @foreach ($games as $game)
                    @if ($plataform->id == $game->plataforms_id)
                    <div class="col-lg-3">
                        <p>{{$game->name}}</p>
                        <img src="{{Storage::url($game->cover)}}" width="100%">

                        <button type="button" class="btn form-control btn-success btn-flat" name="button"><i class="fa fa-fw fa-shopping-cart"></i> Agregar</button>
                        <p class="text-justify">${{number_format($game->price)}}</p>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach


        <div class="tab-pane" id="5">
            <h3>PC GAMES</h3>
            <div id="bloque" >
                <div class="A">
                    <p>Guild Wars 2: Path of Fire </p>
                    <img src="{{ url('assets/images/juegos/GWPc.png') }}">
                    <p>$19.990</p>
                </div>
                <div class="A">
                    <p>Overwatch Origins</p>
                    <img src="{{ url('assets/images/juegos/PC_02.png') }}">
                    <p>$19.990</p>
                </div>
                <div class="A">
                    <p>Diablo III Battlechest </p>
                    <img src="{{ url('assets/images/juegos/PC_03.png') }}">
                    <p>$19.990</p>
                </div>
                <div class="A">
                    <p>Starcraft II Battlechest</p>
                    <img src="{{ url('assets/images/juegos/PC_04.png') }}">
                    <p>$24.990</p>
                </div>
            </div>
        </div-->
    </div>

</div>

@endsection
