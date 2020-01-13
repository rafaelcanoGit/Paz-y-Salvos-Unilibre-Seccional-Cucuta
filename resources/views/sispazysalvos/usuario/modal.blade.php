<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-{{$usu->id_usuario}}">
	{{Form::Open(array('action'=>array('UsuarioController@destroy',$usu->id_usuario),'method'=>'DELETE'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h3 class="modal-title">Eliminar Usuario</h3>
			</div>
			<div class="modal-body">
				<p>Si eliminas el usuario no tendrá más acceso al sistema, Deseas continuar?</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>