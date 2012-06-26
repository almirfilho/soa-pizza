<div class="form-horizontal view">
	<div class="row-fluid title">
		<h2 class="span10">Sabor <?= $flavor[ 'Flavor' ][ 'title' ] ?></h2>
		<div class="span2">
		<?php
			print $this->Html->link( '<i class="icon-trash icon-white"></i> Excluir', "/flavors/delete/{$flavor['Flavor']['id']}", array( 'class' => 'btn btn-mini btn-danger delete', 'escape' => false ) );
			print $this->Html->link( '<i class="icon-edit"></i> Editar', "/flavors/edit/{$flavor['Flavor']['id']}", array( 'class' => 'btn btn-mini', 'escape' => false ) );
		?>
		</div>
	</div>

	<table class="table table-striped">
	<tbody>
		<tr>
			<td class="dlabel">Nome</td>
			<td class="data"><?= $flavor[ 'Flavor' ][ 'title' ] ?></td>
		</tr>
		<tr>
			<td class="dlabel">Preço</td>
			<td class="data"><?= $this->FrontEnd->cash( $flavor[ 'Flavor' ][ 'price' ] ) ?></td>
		</tr>
		<tr>
			<td class="dlabel">Ingredientes</td>
			<td class="data"><?= $flavor[ 'Flavor' ][ 'ingredients' ] ?></td>
		</tr>
	</tbody>
	</table>
</div>

<?= $this->element( 'deleteModal', array( 'model' => 'Sabor' ) ) ?>