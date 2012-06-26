<?php if( empty( $borders ) ){ ?>

	<p class="alert alert-info nothing"><i class="icon-info-sign"></i> Não há nenhuma Borda de Pizza cadastrada ainda. <?= $this->Html->link( 'Criar Nova', '/borders/add', array( 'class' => 'btn btn-mini' ) ) ?></p>

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
	<?php foreach( $borders as $border ): ?>

	<tr>
		<td><i class="icon-border"></i></td>
		<td><?= $this->Html->link( $border[ 'Border' ][ 'title' ], "/borders/view/{$border['Border']['id']}", array( 'escape' => false ) ) ?></td>
		<td><?= $this->FrontEnd->cash( $border[ 'Border' ][ 'price' ] ) ?></td>
	</tr>
		
	<?php endforeach; ?>
	</tbody>
	</table>

<?php print $this->element( "pagination" ); } ?>