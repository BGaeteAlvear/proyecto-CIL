@extends('template.base')

@section('content-title', 'Configuración')

@section('content-subtitle', 'Categoría de Juego')

@section('breadcrumb')
    <li>Configuración</li>
    <li class="active">Categoría de Juego</li>
@endsection

@section('content')

	<div class="col-md-4">
	    <div class="box box-success">
	        <div class="box-header with-border">
	            <h3 class="box-title">Slider</h3>
	            <p>Aquí podrás cargar tus slider</p>

	            <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	                </button>
	                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
	                </button>
	            </div>
	        </div>
	        <div class="box-body">
	            <div class="form-group">
	          <label for="exampleInputFile">Carga tu foto</label>
	          <p class="help-block">Haz click aquí para buscar la imagen.</p>
	          <input type="file" class="cargar-foto" id="cargarFoto">

	          <div class="form-group">
	          	<label for="">Titulo</label>
	          	<input class="form-control" type="text" id="titulo-slider" name="titulo-slider">
	          </div>

	          <div class="form-group">
	          	<label for="">Subtitulo</label>
	          	<input class="form-control" type="text" id="subtitulo-slider" name="subtitulo-slider">
	          </div>	
	
	        </div>
	            <button type="submit" class="btn btn-primary">Cargar</button>
	        </div>
	        <!-- /.box-body -->
	    </div>
	</div>


	<div class="col-md-8">
	    <div class="box box-success">
	        <div class="box-body">
	         
	            <img id="preview-slider" class="preview-slider"src="https://www.btcamericastech.com/wp-content/themes/uplift/images/default-thumb.png">
	            	<h2 id="titulo" class="titulo-slider"></h2>
	            	<h5 id="subtitulo" class="subtitulo-slider"></h5>
	            </img>

	        </div>
	    </div>
	</div>

@endsection

@section('styles')

    <link rel="stylesheet" href="/assets/bootstraptable/dragtable.css">
    <link rel="stylesheet" href="/assets/bootstraptable/bootstrap-table-reorder-rows.css">
    <link rel="stylesheet" href="/assets/bootstraptable/bootstrap-table-fixed-columns.css">
    <link rel="stylesheet" href="/assets/bootstraptable/bootstrap-table.min.css">

    <style>
    	
    	.preview-slider{
    		width: 100%; 
    		height: 250px; 
    		object-fit: cover;
    	}

    	.cargar-foto{
    		margin-bottom: 22px;
    	}

    	.titulo-slider{
    		position: absolute;
		    margin-top: -130px;
		    margin-left: 60px;
		    color: #fff;
		    text-transform: uppercase;
		    font-weight: bold;
    	}

    	.subtitulo-slider{

    		position: absolute;
		    margin-top: -90px;
		    margin-left: 60px;
		    font-style: italic;
		    font-weight: bold;
		    color: #398fc7;
		    text-transform: uppercase
    	}

    </style>

@endsection

@section('scripts')
 	<script src="/assets/required/app.js"></script>

 	<script>
 		

 		/*$('#cargarFoto').change(function(){
 			console.log(this.files[0]);
 			$('#nombre').html(this.files[0].name);
 		});*/


 		function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#preview-slider').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#cargarFoto").change(function(){
            readURL(this);
        });

        $('#titulo-slider').change(function(){
        	$('#titulo').html($('#titulo-slider').val());
        	console.log($('#titulo-slider').val());
        });

        $('#subtitulo-slider').change(function(){
        	$('#subtitulo').html($('#subtitulo-slider').val());
        });
 	</script>

@endsection