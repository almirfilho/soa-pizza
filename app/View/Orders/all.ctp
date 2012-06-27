<?php if( empty( $orders ) ){ ?>

	<p class="alert alert-info nothing"><i class="icon-info-sign"></i> Não há nenhum Pedido em aberto ainda.</p>

<?php } else { ?>

	<table class="table table-striped">
	<thead>
	<tr>
		<th class="pic"></th>
		<th><?= $this->Paginator->sort( "delivery_name", "Nome" ) ?></th>
		<th>Situação</th>
		<th><?= $this->Paginator->sort( "total_price", "Valor" ) ?></th>
		<th><?= $this->Paginator->sort( "created", "Data/hora" ) ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach( $orders as $order ): ?>

	<tr>
		<td><i class="icon-arrow-right"></i></td>
		<td><?= $this->Html->link( $order[ 'Order' ][ 'delivery_name' ], "/orders/view/{$order['Order']['id']}", array( 'escape' => false ) ) ?></td>
		<td><?= $this->FrontEnd->label( $order[ 'Order' ][ 'status' ], $status ) ?></td>
		<td><?= $this->FrontEnd->cash( $order[ 'Order' ][ 'total_price' ] ) ?></td>
		<td><?= $this->FrontEnd->niceDate( $order[ 'Order' ][ 'created' ] ) ?></td>
	</tr>
		
	<?php endforeach; ?>
	</tbody>
	</table>

<?php print $this->element( "pagination" ); } ?>