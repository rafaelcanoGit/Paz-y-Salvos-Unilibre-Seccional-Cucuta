@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Docentes <a href="docente/create"><button class="btn btn-success">Nuevo</button></a> / <a href="subir"><button class="btn btn-success">Subir en Bloque</button></a></h3>
		@include('sispazysalvos.docente.search')
	</div>
</div>

<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
<div class="table-responsive">

<table class="table table-striped table-bordered table-condensed table-hover">

<thead>

<th>Nombre</th>
<th>Apellido</th>   
<th>Documento</th>
<th>Facultad</th>
<th>Opciones</th>
</thead>

@foreach($docentes as $doc )
<tr> 
  <td>{{$doc->nombre}}</td>
  <td>{{$doc->apellido}}</td>
  <td>{{$doc->documento}}</td>
  <td>{{$doc->facultad}}</td>
  <td> 
  <a href="{{URL::action('DocenteController@edit',$doc->documento)}}"><button class="btn btn-info" >Editar</button></a>
  <a href="" data-target="#modal-{{$doc->id_docente}}" data-toggle="modal"><button class="btn btn-danger" >Eliminar</button></a>
  </td>
</tr>
@include('sispazysalvos.docente.modal')
@endforeach
</table>

</div>

 {{$docentes->render()}}

</div>
</div>

@endsection


