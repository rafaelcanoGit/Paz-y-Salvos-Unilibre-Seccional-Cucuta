@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Subir Docentes</h3>
	
	</div>
</div>

<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
<div class="table-responsive">

{!!Form::open(array('url'=>'sispazysalvos/subir','method'=>'POST','autocomplete'=>'off','files' => true))!!} 
{{Form::token()}}
    @csrf
    <input type="file" name="archivo" value=""><br>
    <button class="btn btn-info">Enviar</button>

{!!Form::close()!!}	


</div>



</div>
</div>

@endsection




