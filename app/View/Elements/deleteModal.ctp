<?php

$this->Html->script( 'bootstrap/bootstrap-modal', false );

if( empty( $msg ) )
	$msg = null;

if( empty( $modalTitle ) )
	$modalTitle = "Exclusão de {$model}";

if( empty( $modalBody ) )
	$modalBody = "Tem certeza de que deseja excluir este {$model}? {$msg}";

if( empty( $deleteText ) )
	$modalBody = "Excluir";

?>

<!-- modal -->
<div class="modal hide fade" id="delete">
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3><?= $modalTitle ?></h3>
	</div>
	<div class="modal-body">
		<p><?= $modalBody ?></p>
	</div>
	<div class="modal-footer">
		<a id="deleteCancel" href="#" class="btn">Cancelar</a>
		<a id="deleteConfirm" href="#" class="btn btn-danger"><i class="icon-trash icon-white"></i> <?= $deleteText ?></a>
	</div>
</div>

<script type="text/javascript">

var deleteUrl;

$(document).ready( function(){

	$('.btn.delete').click( function(e){
		e.preventDefault();
		deleteUrl = $(this).attr('href');
		$('#delete').modal('show').on( 'shown', function(){
			$('#deleteConfirm').focus();
		});
	});

	$('#deleteCancel').click( function(e){
		e.preventDefault();
		$('#delete').modal('hide');
	});

	$('#deleteConfirm').click( function(e){
		e.preventDefault();
		window.location = deleteUrl;
	});
});
</script>