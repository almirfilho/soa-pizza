<?php if( empty( $sizes ) ){ ?>

	<p class="alert alert-info nothing"><i class="icon-info-sign"></i> Não há nenhum Tamanho de Pizza cadastrado ainda. <?= $this->Html->link( 'Criar Novo', '/sizes/add', array( 'class' => 'btn btn-mini' ) ) ?></p>

<?php } else { ?>

	<table class="table table-striped">
	<thead>
	<tr>
		<th class="pic"></th>
		<th><?= $this->Paginator->sort( "title", "Nome" ) ?></th>
		<th><?= $this->Paginator->sort( "factor", "Fator de preço" ) ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach( $sizes as $size ): ?>

	<tr>
		<td><i class="icon-size"></i></td>
		<td><?= $this->Html->link( $size[ 'Size' ][ 'title' ], "/sizes/view/{$size['Size']['id']}", array( 'escape' => false ) ) ?></td>
		<td><?= $size[ 'Size' ][ 'factor' ] ?></td>
	</tr>
		
	<?php endforeach; ?>
	</tbody>
	</table>

<?php print $this->element( "pagination" ); } ?>