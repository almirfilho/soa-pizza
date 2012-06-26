<div class="form-horizontal view">
	<div class="row-fluid title">
		<h2 class="span10">Borda de <?= $border[ 'Border' ][ 'title' ] ?></h2>
		<div class="span2">
		<?php
			print $this->Html->link( '<i class="icon-trash icon-white"></i> Excluir', "/borders/delete/{$border['Border']['id']}", array( 'class' => 'btn btn-mini btn-danger delete', 'escape' => false ) );
			print $this->Html->link( '<i class="icon-edit"></i> Editar', "/borders/edit/{$border['Border']['id']}", array( 'class' => 'btn btn-mini', 'escape' => false ) );
		?>
		</div>
	</div>

	<table class="table table-striped">
	<tbody>
		<tr>
			<td class="dlabel">Nome</td>
			<td class="data"><?= $border[ 'Border' ][ 'title' ] ?></td>
		</tr>
		<tr>
			<td class="dlabel">Preço</td>
			<td class="data"><?= $this->FrontEnd->cash( $border[ 'Border' ][ 'price' ] ) ?></td>
		</tr>
	</tbody>
	</table>
</div>

<?= $this->element( 'deleteModal', array( 'model' => 'Borda' ) ) ?>