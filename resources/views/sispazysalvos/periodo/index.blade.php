@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Periodos <a href="periodo/create"><button class="btn btn-success">Nuevo</button></a></h3>
		
	</div>
</div>

<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
<div class="table-responsive">

<table class="table table-striped table-bordered table-condensed table-hover">

<thead>

<th>Año</th>
<th>Periodo</th>
<th>Opciones</th>
</thead>

@foreach($periodos as $per )
<tr> 
  <td>{{$per->ano}}</td>
  <td>{{$per->periodo}}</td>
  
  <td> 
  
  <a href="" data-target="#modal-{{$per->id_periodoac}}" data-toggle="modal"><button class="btn btn-danger" >Eliminar</button></a>
  </td>
</tr>
@include('sispazysalvos.periodo.modal')
@endforeach
</table>

</div>

 {{$periodos->render()}}

</div>
</div>

@endsection


