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
            <li class="active"><a href="{{ route('dashboard') }}"><b class="titulo-nav">Inicio</b></a></li>
            @foreach ($plataforms as $plataform)
        @if($plataform[0])
            <li><a href="#{{$plataform->id}}" aria-expanded="true" data-toggle="tab">{{$plataform->name}}</a></li>
        @endif
        <li><a href="#{{$plataform->id}}" data-toggle="tab">{{$plataform->name}}</a></li>
        @endforeach

        </ul>
        <!--<form class="navbar-form navbar-right" action="/action_page.php">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Buscar">
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
        </form>-->
    </div>
</nav>



<div id="exTab2" class="container-fluid item-pills">
    <div class="tab-content">

        @for ($i = 0; $i < count($plataforms); $i++)
        @if($i==1)
            <div class="tab-pane active" id="{{$plataforms[$i]->id}}">
        @else
            <div class="tab-pane" id="{{$plataforms[$i]->id}}">
        @endif

            <h3>{{$plataforms[$i]->name}}</h3>
            <div class="col-lg-12">
                <div class="row">
                    @foreach ($games as $game)
                    @if ($plataforms[$i]->id == $game->plataforms_id)
                    <div class="col-lg-3">
                        <p>{{$game->name}}</p>
                        <img src="{{Storage::url($game->cover)}}" width="100%">

                        <button type="button" id="{{$game->id}}" onclick="addCart(this)" class="btn form-control btn-success btn-flat" name="button">Agregar</button></a>
                        <p class="text-justify">${{number_format($game->price)}}</p>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        @endfor

    </div>

</div>



@endsection

@section('scripts')
    <script>

    function addCart(value) {
        var id =value.id;
        var url = '{{route('games.add-cart')}}';
        $.ajax({
            type: 'POST',
            url: url,
            data: {
                _token : '{{ csrf_token() }}',
                id : id
            },
            success: function (data) {
                console.log(data);
                if (data.errors) {

                }
                if(data.status === 'success'){
                    showToastSuccess(data.message);
                    $('#countCart').html(data.length);

                }
            },
            error: function (error) {
                showToastError('Error inesperado, por favor inténtalo denuevo mas tarde.');

            }
        });
    }
    </script>
@endsection
