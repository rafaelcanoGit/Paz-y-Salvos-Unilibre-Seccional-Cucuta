@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Docente</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div> 
			@endif

			{!!Form::open(array('url'=>'sispazysalvos/docente','method'=>'POST','autocomplete'=>'off'))!!} 
            {{Form::token()}}
         
           {{--Esto es un comentario--}}
           {{--El metodo para comunicarme con la funcion store que guarda en la database es POST.--}}

            <div class="form-group"> 
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" placeholder="Nombre...">
            </div>
            <div class="form-group">
            	<label for="nombre">Apellido</label>
            	<input type="text" name="apellido" class="form-control" placeholder="Apellido...">
            </div>
            <div class="form-group">
            	<label for="nombre">Documento</label>
            	<input type="number" name="documento" class="form-control" placeholder="Documento...">
            </div>
           
			<div class="form-group">
            	<label for="nombre">Facultad a la que pertenece:</label> <br>
		@foreach($facultades as $facu)	
        <label> <input type="checkbox"  name="facultades[]" class="form"  value= "{{$facu->id_facultad}}"> {{$facu->nombre}} <label>
		@endforeach	
		
            </div>

           
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
           
			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection