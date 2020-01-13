@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Facultades <a href="facultad/create"><button class="btn btn-success">Nuevo</button></a></h3>
	
	</div>
</div>

<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
<div class="table-responsive">

<table class="table table-striped table-bordered table-condensed table-hover">

<thead>

<th>Nombre Facultad</th>
<th>Opciones</th>
</thead>

@foreach($facultades as $fac )
<tr> 
  <td>{{$fac->nombre}}</td>
  
  <td> 
  <a href=" {{URL::action('FacultadController@edit',$fac->id_facultad)}}  "><button class="btn btn-info" >Editar</button></a>
  <a href="" data-target="#modal-{{$fac->id_facultad}}" data-toggle="modal"><button class="btn btn-danger" >Eliminar</button></a>
  </td>
</tr>
@include('sispazysalvos.facultad.modal')
@endforeach
</table>

</div>

 {{$facultades->render()}}

</div>
</div>

@endsection


