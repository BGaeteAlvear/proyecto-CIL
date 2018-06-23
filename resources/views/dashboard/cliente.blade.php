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
                        <img src="{{Storage::url($game->cover)}}" width="100%" data-toggle="modal" data-target="#PlaceModal-{{$game->id}}">
                        <button type="button" class="btn form-control btn-success btn-flat" name="button"><i class="fa fa-fw fa-shopping-cart"><a href="{{ route('game.addCart',['id'=>$game->id])}}"></i> Agregar</button></a>
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
 <!-- Modal -->

<!-- Modal -->
@foreach($games as $game)
  <div class="modal fade bs-example-modal-lg" id="PlaceModal-{{$game->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
                <div class="modal-header" >
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="modal-title" id="myModalLabel"><i class="fa  fa-gamepad"></i> {{$game->name}}</h3>

                </div>


        <div class="modal-body" >
           <table class="table text-center">
                    <tbody>
                        <tr>
                            <td> <img src="{{Storage::url($game->cover)}}" style="width:300px ;height:380px;"> </td>
                        <td>
                            <table>
                                <tr>
                                    <td>
                                    <h3 class="modal-title" id="title"> Descripción</h3>
                                     <h5 class="modal-title" id="myModalDescription">{{$game->description}}</h5>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>
                                      <h3 class="modal-title" id="title"> Video</h3>
                                      <iframe src="https://www.youtube.com/embed/K0u_kAWLJOA"
                                     width="400" height="200" frameborder="0" allowfullscreen></iframe>

                                    </td>
                                 </tr>
                             </table>
                        </td>
                        </tr>
                     </tbody>
                </table>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    
                
                

        </div>

        <div class="modal-footer">


           

          </div>
      
        </div>
      
    </div>
  </div>

@endforeach
               
                   
@endsection
