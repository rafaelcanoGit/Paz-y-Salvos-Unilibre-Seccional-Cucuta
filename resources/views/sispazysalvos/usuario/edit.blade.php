@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Usuario: {{$usuario->nombre}}  </h3> {{--Esta variable $docente la envia el controller y se obtiene aqui através del metodo edit--}}
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
			{!!Form::model($usuario,['method'=>'PATCH','route'=>['usuario.update',$usuario->id_usuario]])!!}
            {{Form::token()}}

			<div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="nombre" value="{{ $usuario->nombre }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>    
						<div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>                  

                       <div class="form-group row">
                            <label for="rol" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>
                       <div class="col-md-6"> 

							@if($usuario->estado=='Activo')  
                <select id="rol "name="estado" class="form-control">
				
                      <option value="Activo" selected> Activo </option> 
                      <option value="Inactivo"> Inactivo </option> 
    
                </select>
							@else
							       
                <select id="rol "name="rol" class="form-control">
				
                      <option value="administrador" > Activo </option> 
                      <option value="talento" selected> Inactivo </option> 
    
                </select>
				           @endif                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="rol" class="col-md-4 col-form-label text-md-right">{{ __('Rol') }}</label>
	                   
                            <div class="col-md-6">
	   @if($usuario->rol=='Administrador')          
                <select id="rol "name="rol" class="form-control">
				
                      <option value="Administrador" selected> Administrador </option> 
                      <option value="Talento-Humano"> Talento Humano </option> 
                      <option value="Caja"> Caja</option> 
                @foreach($dependencias as $dep)
                <option value="{{$dep->nombre}}"> {{$dep->nombre}} </option> 
                @endforeach   
                </select>
                            
		@elseif($usuario->rol=='Talento-Humano')
		<select id="rol "name="rol" class="form-control">
				
				<option value="Administrador" > Administrador </option> 
				<option value="Talento-Humano" selected> Talento Humano </option>  
				<option value="Caja"> Caja</option>
                @foreach($dependencias as $dep)
                <option value="{{$dep->nombre}}"> {{$dep->nombre}} </option> 
                @endforeach    
		  </select>
							
		@elseif($usuario->rol=='Caja')
		<select id="rol "name="rol" class="form-control">
				
				<option value="Administrador" > Administrador </option> 
				<option value="Talento-Humano" > Talento Humano </option>  
				<option value="Caja"selected> Caja</option> 
                @foreach($dependencias as $dep)
                <option value="{{$dep->nombre}}"> {{$dep->nombre}} </option> 
                @endforeach  
		  </select>
							
		@else
		<select id="rol "name="rol" class="form-control">
				
				<option value="Administrador" > Administrador </option> 
				<option value="Talento-Humano" > Talento Humano </option> 
				<option value="Dependencia"> Dependencia </option> 
				@foreach($dependencias as $dep)
                @if($usuario->rol==$dep->nombre)
                <option value="{{$dep->nombre}}" selected> {{$dep->nombre}} </option> 
                @else
                <option value="{{$dep->nombre}}"> {{$dep->nombre}} </option>
                @endif
                @endforeach    
		  </select>
		@endif  					            
                            </div>
                        </div>
            
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection