<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-{{$doc->id_docente}}">
	{{Form::Open(array('action'=>array('DocenteController@destroy',$doc->id_docente),'method'=>'DELETE'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h3 class="modal-title">Eliminar Docente</h3>
			</div>
			<div class="modal-body">
				<p>Confirmas que deseas Eliminar el Docente ?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>