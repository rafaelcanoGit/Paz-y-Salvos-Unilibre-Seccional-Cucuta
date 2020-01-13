@extends ('layouts.dependencia')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Actualizar Estado Docente: {{$docente->nombre}} {{$docente->apellido}} </h3> {{--Esta variable $docente la envia el controller y se obtiene aqui através del metodo edit--}}
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif


             {{--El metodo para comunicarme con la funcion update del controller es PATCH--}}
			 {{--Había ocurrido un error al enviar la ruta, se soluciono verificando con el comado php artisan route:list la lista de rutas--}}
		
			{!!Form::model($estadodoc,['method'=>'PATCH','route'=>['docen.update',$estadodoc->id_estado_doc]])!!}
            {{Form::token()}}

            <div class="form-group"> 
            	<label for="nombre">Nombre </label>
            	<label name="nombre" class="form-control" value="{{$docente->nombre}}">{{$docente->nombre}}</label>
            </div>

            <div class="form-group">
            	<label for="nombre">Apellido</label>
            	<label name="apellido" class="form-control" value="{{$docente->apellido}}">{{$docente->apellido}}</label>
            </div>
            <div class="form-group">
            	<label for="nombre">Documento</label>
            	<label name="documento" class="form-control" value="{{$docente->documento}}">{{$docente->documento}}</label>
            </div>

			<div class="form-group">
            	<label for="nombre">Facultad a la que pertenece:</label> 
            <label name="" class="form"  value= "{{$facultad->nombre}}">{{$facultad->nombre}} </label>
            </div>
			<label for="nombre">Estado:</label> <br>
			@if($estadodoc->estado=='A Paz y Salvo')  
                <select id="estado "name="estado" class="form-control">
				
                      <option value="A Paz y Salvo" selected> A Paz y Salvo </option> 
                      <option value="Por Confirmar"> Por Confirmar </option> 
					  <option value="Deuda"> Deuda </option> 
    
                </select><br>
			@elseif($estadodoc->estado=='Deuda')
							       
                <select id="estado "name="estado" class="form-control">
				
				      <option value="A Paz y Salvo" > A Paz y Salvo </option> 
                      <option value="Por Confirmar"> Por Confirmar </option> 
					  <option value="Deuda" selected> Deuda </option>
    
                </select> <br>
			@else
				<select id="estado "name="estado" class="form-control">
				
			    	  <option value="A Paz y Salvo" > A Paz y Salvo </option> 
                      <option value="Por Confirmar" selected> Por Confirmar </option> 
					  <option value="Deuda" > Deuda </option> 
    
                </select><br>

		   @endif  

		   <div class="form-group red-border-focus">
           <label for="exampleFormControlTextarea5">Observación</label>
           <textarea class="form-control" id="observacion" name="observacion" rows="3" >{{$estadodoc->observacion}}</textarea>
           </div>


            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection