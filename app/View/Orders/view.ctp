<div class="form-horizontal view">
	<div class="row-fluid title">
		<h2 class="span10">Pedido #<?= $order[ 'Order' ][ 'id' ] ?></h2>
		<div class="span2">
		<?php
			print $this->Html->link( '<i class="icon-trash icon-white"></i> Cancelar', "/orders/mark/{$order['Order']['id']}/F", array( 'class' => 'btn btn-mini btn-danger delete', 'escape' => false ) );
			print $this->Html->link( '<i class="icon-ok icon-white"></i> Concluir', "/orders/mark/{$order['Order']['id']}/C", array( 'class' => 'btn btn-mini btn-success', 'escape' => false ) );
		?>
		</div>
	</div>

	<table class="table table-striped">
	<tbody>
		<tr>
			<td class="dlabel">Nome do cliente</td>
			<td class="data"><?= $order[ 'Order' ][ 'delivery_name' ] ?></td>
		</tr>
		<tr>
			<td class="dlabel">Endereço de entrega</td>
			<td class="data"><?= $order[ 'Order' ][ 'delivery_address' ] ?></td>
		</tr>
		<tr>
			<td class="dlabel">Telefone de contato</td>
			<td class="data"><?= $order[ 'Order' ][ 'delivery_phone' ] ?></td>
		</tr>
	</tbody>
	</table>
	<div class="divider"></div>
	<table class="table table-striped">
	<tbody>
		<tr>
			<td class="dlabel">Data/hora</td>
			<td class="data"><?= $this->FrontEnd->niceDate( $order[ 'Order' ][ 'created' ] ) ?></td>
		</tr>
		<tr>
			<td class="dlabel">Valor total</td>
			<td class="data"><?= $this->FrontEnd->cash( $order[ 'Order' ][ 'total_price' ] ) ?></td>
		</tr>
		<tr>
			<td class="dlabel">Situação</td>
			<td class="data"><?= $this->FrontEnd->label( $order[ 'Order' ][ 'status' ], $status ) ?></td>
		</tr>
	</tbody>
	</table>

	<h3>Pizzas</h3>

	<?php if( empty( $order[ 'Pizza' ] ) ){ ?>

		<p class="alert alert-info nothing"><i class="icon-info-sign"></i> Não há pizzas neste pedido!</p>

	<?php } else { ?>

		<table class="table table-striped">
		<thead>
		<tr>
			<th class="pic"></th>
			<th>Sabor</th>
			<th>Tamanho</th>
			<th>Borda</th>
			<th>Valor</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach( $order[ 'Pizza' ] as $pizza ): ?>

		<tr>
			<td></td>
			<td><?= $pizza[ 'Flavor' ][ 'title' ] ?></td>
			<td><?= $pizza[ 'Size' ][ 'title' ] ?></td>
			<td><?= $pizza[ 'Border' ][ 'title' ] ?></td>
			<td><?= $this->FrontEnd->cash( $pizza[ 'price' ] ) ?></td>
		</tr>
			
		<?php endforeach; ?>
		</tbody>
		</table>

	<?php } ?>

</div>

<?= $this->element( 'deleteModal', array( 
		'model' => 'Pedido', 
		'deleteText' => 'Confirmar',
		'modalTitle' => 'Cancelamento de Pedido', 
		'modalBody' => 'Tem certeza que deseja cancelar este Pedido?' ) ) ?>