<div class="hero-unit" id="success">
	<h1>Pedido realizado!</h1>
	<p>Seu pedido foi realizado com sucesso.<br />Confira os dados de sua(s) pizza(s) abaixo.</p>
	<div class="row">
		<div class="span6">
			<div class="block well">
				<ul>
					<li>Nome: <i class="icon-user"></i> <strong><?= $order[ 'Order' ][ 'delivery_name' ] ?></strong></li>
					<li>Endereço: <i class="icon-home"></i> <strong><?= $order[ 'Order' ][ 'delivery_address' ] ?></strong></li>
					<li>Telefone: <i class="icon-asterisk"></i> <strong><?= $order[ 'Order' ][ 'delivery_phone' ] ?></strong></li>
					<li>Pedido realizado em: <strong><?= $this->FrontEnd->niceDate( $order[ 'Order' ][ 'delivery_phone' ] ) ?></strong></li>
					<li>Valor total: <span class="total label label-inverse"><?= $this->FrontEnd->cash( $order[ 'Order' ][ 'total_price' ] ) ?></span></li>
				</ul>
			</div>
			<div class="row">
			<?php foreach( $order[ 'Pizza' ] as $pizza ): ?>
				<div class="block well span2">
					<ul>
						<li>Sabor: <strong><?= $pizza[ 'Flavor' ][ 'title' ] ?></strong></li>
						<li>Tamanho: <strong><?= $pizza[ 'Size' ][ 'title' ] ?></strong></li>
						<li>Borda: <strong><?= $pizza[ 'Border' ][ 'title' ] ?></strong></li>
						<li><span class="label label-info"><?= $this->FrontEnd->cash( $pizza[ 'price' ] ) ?></span></li>
					</ul>
				</div>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>