@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Dependencias <a href="dependencia/create"><button class="btn btn-success">Nuevo</button></a></h3>
	
	</div>
</div>

<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
<div class="table-responsive">

<table class="table table-striped table-bordered table-condensed table-hover">

<thead>

<th>Nombre Dependencia</th>
<th>Opciones</th>
</thead>

@foreach($facultades as $fac )
<tr> 
  <td>{{$fac->nombre}}</td>
  
  <td> 
  <a href=" {{URL::action('DepenController@edit',$fac->id_dependencia)}}  "><button class="btn btn-info" >Editar</button></a>
  <a href="" data-target="#modal-{{$fac->id_dependencia}}" data-toggle="modal"><button class="btn btn-danger" >Eliminar</button></a>
  </td>
</tr>
@include('sispazysalvos.dependencia.modal')
@endforeach
</table>

</div>

 {{$facultades->render()}}

</div>
</div>

@endsection


