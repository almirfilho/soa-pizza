<?php if( empty( $flavors ) ){ ?>

	<p class="alert alert-info nothing"><i class="icon-info-sign"></i> Não há nenhum Sabor de Pizza cadastrado ainda. <?= $this->Html->link( 'Criar Novo', '/flavors/add', array( 'class' => 'btn btn-mini' ) ) ?></p>

<?php } else { ?>

	<table class="table table-striped">
	<thead>
	<tr>
		<th class="pic"></th>
		<th><?= $this->Paginator->sort( "title", "Nome" ) ?></th>
		<th><?= $this->Paginator->sort( "price", "Preço" ) ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach( $flavors as $flavor ): ?>

	<tr>
		<td><i class="icon-flavor"></i></td>
		<td><?= $this->Html->link( $flavor[ 'Flavor' ][ 'title' ], "/flavors/view/{$flavor['Flavor']['id']}", array( 'escape' => false ) ) ?></td>
		<td><?= $this->FrontEnd->cash( $flavor[ 'Flavor' ][ 'price' ] ) ?></td>
	</tr>
		
	<?php endforeach; ?>
	</tbody>
	</table>

<?php print $this->element( "pagination" ); } ?>