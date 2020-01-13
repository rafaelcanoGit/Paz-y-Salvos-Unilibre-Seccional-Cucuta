@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Usuario <a href="usuario/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('sispazysalvos.usuario.search')
	</div>
</div>

<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
<div class="table-responsive">

<table class="table table-striped table-bordered table-condensed table-hover">

<thead>

<th>Nombre Usuario</th>
<th>Email</th>
<th>Estado</th>
<th>Rol</th>
<th>Opciones</th>
</thead>

@foreach($usuarios as $usu )
<tr> 
  <td>{{$usu->nombre}}</td>
  <td>{{$usu->email}}</td>
  <td>{{$usu->estado}}</td>
  <td>{{$usu->rol}}</td>
  
  <td> 
  <a href=" {{URL::action('UsuarioController@edit',$usu->id_usuario)}} "><button class="btn btn-info" >Editar</button></a>
  <a href="" data-target="#modal-{{$usu->id_usuario}}" data-toggle="modal"><button class="btn btn-danger" >Eliminar</button></a>
  </td>
</tr>
@include('sispazysalvos.usuario.modal')
@endforeach
</table>

</div>

 {{$usuarios->render()}}

</div>
</div>

@endsection


