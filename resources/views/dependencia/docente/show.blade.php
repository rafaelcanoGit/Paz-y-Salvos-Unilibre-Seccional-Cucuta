@extends ('layouts.dependencia')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Docentes  </h3>
	
	</div>
</div>

<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
<div class="table-responsive">

<table class="table table-striped table-bordered table-condensed table-hover">

<thead>

<th>Año</th>
<th>Periodo</th>
<th>Nombre</th>  
<th>Apellido</th> 
<th>Documento</th>      
<th>Facultad</th>
<th>Estado</th>
<th>Opciones</th>
</thead>

@foreach($docentes as $doc )
<tr> 
  <td>{{$doc->ano}}</td>
  <td>{{$doc->periodo}}</td>
  <td>{{$doc->nombre}}</td>
  <td>{{$doc->apellido}}</td>
  <td>{{$doc->documento}}</td>
  <td>{{$doc->facultad}}</td>
  @if($doc->estado == 'Deuda')
  <td  ><span style="background-color:#fd7e7e";>{{$doc->estado}}</span></td>
  @elseif($doc->estado == 'Por Confirmar')
  <td  ><span style="background-color:#ffe888";>{{$doc->estado}}</span></td>
  @elseif($doc->estado == 'A Paz y Salvo')
  <td  ><span style="background-color:#75ff70";>{{$doc->estado}}</span></td>
  @endif
  <td> 
  <a href="{{URL::action('DependenciaDocenteController@edit',$doc->id_estadodoc)}}"><button class="btn btn-info">Editar</button></a>
  </td>
</tr>

@endforeach
</table>

</div>

 {{$docentes->render()}}

</div>
</div>

@endsection





