@extends ('layouts.talentohumano')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Paz y Salvo</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div> 
			@endif

			{!!Form::open(array('url'=>'talentohumano/pazysalvos','method'=>'POST','autocomplete'=>'off'))!!} 
            {{Form::token()}}
         
           {{--Esto es un comentario--}}
           {{--El metodo para comunicarme con la funcion store que guarda en la database es POST.--}}
		
		   <div class="form-group">
            	<label for="nombre">Periodo Academico </label> <br>
            <select id="periodo "name="periodo" class="form-control">
            @foreach($periodos as $per)
                      <option value="{{$per->id_periodoac}}"> {{$per->ano}}-{{$per->periodo}} </option>      
			@endforeach
			</select>
			</div>

			<div class="form-group">
            	<label for="nombre">Facultad </label> <br>	
				<select id="facultad "name="facultad" class="form-control">
		    @foreach($facultades as $facu)	
                      <option value="{{$facu->id_facultad}}"> {{$facu->nombre}} </option>      
	     	@endforeach	
			 </select>
		   </div>

		<div class="form-group">
            	<label for="nombre">Dependencias:</label> <br>
		@foreach($dependencias as $dep)	
        <label> <input type="checkbox"  name="dependencias[]" class="form"  value= "{{$dep->id_dependencia}}"> {{$dep->nombre}} <label>
		@endforeach	
		</div>
           
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Lanzar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
           
			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection