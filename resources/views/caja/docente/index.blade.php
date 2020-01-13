@extends ('layouts.caja')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Docentes </h3>
		@include('caja.docente.search')
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
<th>Estado Cheque</th>
<th>Observación</th>
<th>Actualizado</th>
<th>Opciones</th>
</thead>

@foreach($docentes as $doc )
<tr> 
  <td>{{$doc->nombre}}</td>
  <td>{{$doc->apellido}}</td>
  <td>{{$doc->documento}}</td>
  <td>{{$doc->facultad}}</td>
  @if($doc->estado == '----')
  <td  ><span style="background-color:#ffe888";>{{$doc->estado}}</span></td>
  @elseif($doc->estado == 'Entregado')
  <td  ><span style="background-color:#75ff70";>{{$doc->estado}}</span></td>
  @endif
  <td>{{$doc->observacion}}</td>
  <td>{{$doc->actualizado}}</td>
  
  <td> 
  <a href="{{ url('caja/docents',$doc->id)}}"><button class="btn btn-info" >Ver</button></a>
  </td>
</tr>

@endforeach
</table>

</div>

 {{$docentes->render()}}

</div>
</div>

@endsection


