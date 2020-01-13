@extends ('layouts.talentohumano')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Docentes </h3>
		@include('talentohumano.docente.search')
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

</thead>

@foreach($docentes as $doc )
<tr> 
  <td>{{$doc->nombre}}</td>
  <td>{{$doc->apellido}}</td>
  <td>{{$doc->documento}}</td>
  <td>{{$doc->facultad}}</td>
  
</tr>

@endforeach
</table>

</div>

 {{$docentes->render()}}

</div>
</div>

@endsection


