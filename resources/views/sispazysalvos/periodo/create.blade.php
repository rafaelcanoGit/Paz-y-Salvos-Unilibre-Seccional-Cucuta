@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Periodo</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div> 
			@endif

			{!!Form::open(array('url'=>'sispazysalvos/periodo','method'=>'POST','autocomplete'=>'off'))!!} 
            {{Form::token()}}
         
           {{--Esto es un comentario--}}
           {{--El metodo para comunicarme con la funcion store que guarda en la database es POST.--}}
           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group"> 
            	<label for="ano">Año</label>
            	<select name="ano" class="form-control">
                      <option value="2019"> 2019 </option> 
                      <option value="2020"> 2020 </option> 
                      <option value="2021"> 2021 </option> 
                      <option value="2022"> 2022 </option> 
                      <option value="2023"> 2023 </option>                   
                      
                </select>
            </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group"> 
            	<label for="periodo">Periodo</label>
            	<select name="periodo" class="form-control">
                      <option value="01"> 01 </option> 
                      <option value="02"> 02 </option>     
                </select>
            </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            </div>
           
			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection