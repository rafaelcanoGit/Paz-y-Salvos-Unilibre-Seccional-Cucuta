@extends ('layouts.caja')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Paz y salvos del Docente: {{$docente->nombre}} {{$docente->apellido}}  </h3>
	
	</div>
</div>

<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
<div class="table-responsive">

<table class="table table-striped table-bordered table-condensed table-hover">

<thead>

<th>Año</th>
<th>Periodo</th>     
<th>Dependencia</th>
<th>Estado</th>
<th>Observación</th>

</thead>

@foreach($estadosDocente as $edoc )
<tr> 
  <td>{{$edoc->ano}}</td>
  <td>{{$edoc->periodo}}</td>
  <td>{{$edoc->dependencia}}</td>
  @if($edoc->estado == 'Deuda')
  <td  ><span style="background-color:#fd7e7e";>{{$edoc->estado}}</span></td>
  @elseif($edoc->estado == 'Por Confirmar')
  <td  ><span style="background-color:#ffe888";>{{$edoc->estado}}</span></td>
  @elseif($edoc->estado == 'A Paz y Salvo')
  <td  ><span style="background-color:#75ff70";>{{$edoc->estado}}</span></td>
  @endif
  <td>{{$edoc->observacion}}</td>  
</tr>

@endforeach
</table>

</div>

 {{$estadosDocente->render()}}
 
 <a href="{{ url('caja/estadocaja',$docente->id_docente)}}"><button class="btn btn-info">Agregar</button></a>

</div>
</div>

@endsection

