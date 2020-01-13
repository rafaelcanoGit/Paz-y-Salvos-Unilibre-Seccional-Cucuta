@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Facultad: {{$facultad->nombre}}  </h3> {{--Esta variable $docente la envia el controller y se obtiene aqui através del metodo edit--}}
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
		
			{!!Form::model($facultad,['method'=>'PATCH','route'=>['facultad.update',$facultad->id_facultad]])!!}
            {{Form::token()}}

            <div class="form-group"> 
            	<label for="nombre">Nombre</label>
            	<input type="text" name="nombre" class="form-control" value="{{$facultad->nombre}}" placeholder="Nombre...">
            </div>
            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection