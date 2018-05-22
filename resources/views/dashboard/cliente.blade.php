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
      <li><a href="#" class="item-nav">PS4</a></li>
      <li><a href="#" class="item-nav">XBOXone</a></li>
      <li><a href="#" class="item-nav">SWITCH</a></li>
      <li><a href="#" class="item-nav">3DS</a></li>
      <li><a href="#" class="item-nav">PC</a></li>
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
              <li class="active"><a  href="#1" data-toggle="tab">PS4</a></li>
              <li><a href="#2" data-toggle="tab">XBOXone</a></li>
              <li><a href="#3" data-toggle="tab">SWITCH</a></li>
              <li><a href="#4" data-toggle="tab">3DS</a></li>
              <li><a href="#5" data-toggle="tab">PC</a></li>
            </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="1">
              <h3>PS4 GAMES</h3>
               <div id="bloque" >
                  <div class="A"> 
                  <p>EVE: Valkyrie VR</p>
                  <img src="{{ url('assets/images/juegos/PS4.png') }}">
                  <p>$24.990</p>
                  </div>
                   <div class="A"> 
                  <p>Fall Out</p>
                  <img src="{{ url('assets/images/juegos/PS4_02.png') }}">
                  <p>$5.990</p>
                  </div>
                   <div class="A"> 
                  <p>Gran Theft Auto</p>
                  <img src="{{ url('assets/images/juegos/PS4_03.png') }}">
                  <p>$44.990</p>
                  </div>
                   <div class="A"> 
                  <p>God Of War</p>
                  <img src="{{ url('assets/images/juegos/PS4_04.png') }}">
                  <p>$44.990</p>
                  </div>
               </div>
            </div>
            <div class="tab-pane" id="2">
              <h3>XBOXone GAMES</h3>
              <div id="bloque" >
                  <div class="A"> 
                  <p>Dragon Ball Fighter Z</p>
                  <img src="{{ url('assets/images/juegos/DBZXbox.png') }}">
                  <p>$39.990</p>
                  </div>
                   <div class="A"> 
                  <p>Far Cry 5</p>
                  <img src="{{ url('assets/images/juegos/FarCryXbox.png') }}">
                  <p>$54.990</p>
                  </div>
                   <div class="A"> 
                  <p>State of Decay 2</p>
                  <img src="{{ url('assets/images/juegos/StateXbox.png') }}">
                  <p>$24.990</p>
                  </div>
                   <div class="A"> 
                  <p>Lords of the Fallen</p>
                  <img src="{{ url('assets/images/juegos/LordXbox.png') }}">
                  <p>$5.990</p>
                  </div>
               </div>
                
            </div>
            <div class="tab-pane" id="3">
              <h3>SWITCH GAMES</h3>
               <div id="bloque" >
                  <div class="A"> 
                  <p>Hyrule Warriors</p>
                  <img src="{{ url('assets/images/juegos/ZeldaSW.png') }}">
                  <p>$44.990</p>
                  </div>
                   <div class="A"> 
                  <p>Donkey Kong Country: Tropical</p>
                  <img src="{{ url('assets/images/juegos/SW_02.png') }}">
                  <p>$44.990</p>
                  </div>
                   <div class="A"> 
                  <p>Mega Man Legacy Collection</p>
                  <img src="{{ url('assets/images/juegos/SW_03.png') }}">
                  <p>$34.990</p>
                  </div>
                   <div class="A"> 
                  <p>Super Smash Bros</p>
                  <img src="{{ url('assets/images/juegos/SW_04.png') }}">
                  <p>$44.990</p>
                  </div>
               </div>
            </div>
            <div class="tab-pane" id="4">
              <h3>3DS GAMES</h3>
               <div id="bloque" >
                  <div class="A"> 
                  <p>Dragon Ball Fighter Z</p>
                  <img src="{{ url('assets/images/juegos/DBZXbox.png') }}">
                  <p>$39.990</p>
                  </div>
                   <div class="A"> 
                  <p>Far Cry 5</p>
                  <img src="{{ url('assets/images/juegos/FarCryXbox.png') }}">
                  <p>$54.990</p>
                  </div>
                   <div class="A"> 
                  <p>State of Decay 2</p>
                  <img src="{{ url('assets/images/juegos/StateXbox.png') }}">
                  <p>$24.990</p>
                  </div>
                   <div class="A"> 
                  <p>Lords of the Fallen</p>
                  <img src="{{ url('assets/images/juegos/LordXbox.png') }}">
                  <p>$5.990</p>
                  </div>
               </div>
            </div>
            <div class="tab-pane" id="5">
              <h3>PC GAMES</h3>
               <div id="bloque" >
                  <div class="A"> 
                  <p>Donkey Kong Country: Tropical</p>
                  <img src="{{ url('assets/images/juegos/SW_02.png') }}">
                  <p>$44.990</p>
                  </div>
                   <div class="A"> 
                  <p>Far Cry 5</p>
                  <img src="{{ url('assets/images/juegos/FarCryXbox.png') }}">
                  <p>$54.990</p>
                  </div>
                   <div class="A"> 
                  <p>State of Decay 2</p>
                  <img src="{{ url('assets/images/juegos/StateXbox.png') }}">
                  <p>$24.990</p>
                  </div>
                   <div class="A"> 
                  <p>Lords of the Fallen</p>
                  <img src="{{ url('assets/images/juegos/LordXbox.png') }}">
                  <p>$5.990</p>
                  </div>
               </div>
            </div>
      </div>

</div>

@endsection
