@extends ('layouts.dependencia')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Paz y Salvos </h3>
		
	</div>
</div>

<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
<div class="table-responsive">

<table class="table table-striped table-bordered table-condensed table-hover">

<thead>

<th>Año</th>
<th>Periodo</th>   
<th>Facultad</th>
<th>Dependencia</th>
<th>Opciones</th>
</thead>

@foreach($pazysalvos as $pys )
<tr> 
  <td>{{$pys->ano}}</td>
  <td>{{$pys->periodo}}</td>
  <td>{{$pys->facultad}}</td>
  <td>{{$pys->dependencia}}</td>
  <td> 
  <a href="{{ url('dependencia/docen',$pys->id_pazysalvo)}}"><button class="btn btn-success">Acceder</button></a>
  </td>
</tr>

@endforeach
</table>

</div>

 {{$pazysalvos->render()}}

</div>
</div>

@endsection


