<div class="form-horizontal view">
	<div class="row-fluid title">
		<h2 class="span10">Tamanho <?= $size[ 'Size' ][ 'title' ] ?></h2>
		<div class="span2">
		<?php
			print $this->Html->link( '<i class="icon-trash icon-white"></i> Excluir', "/sizes/delete/{$size['Size']['id']}", array( 'class' => 'btn btn-mini btn-danger delete', 'escape' => false ) );
			print $this->Html->link( '<i class="icon-edit"></i> Editar', "/sizes/edit/{$size['Size']['id']}", array( 'class' => 'btn btn-mini', 'escape' => false ) );
		?>
		</div>
	</div>

	<table class="table table-striped">
	<tbody>
		<tr>
			<td class="dlabel">Nome</td>
			<td class="data"><?= $size[ 'Size' ][ 'title' ] ?></td>
		</tr>
		<tr>
			<td class="dlabel">Fator de preço</td>
			<td class="data"><?= $size[ 'Size' ][ 'factor' ] ?></td>
		</tr>
	</tbody>
	</table>
</div>

<?= $this->element( 'deleteModal', array( 'model' => 'Tamanho' ) ) ?>