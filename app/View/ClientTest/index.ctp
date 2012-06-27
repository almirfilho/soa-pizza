<h1>Pizzas</h1>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Sabores</th>
			<th>Ingredientes</th>
			<?php foreach( $sizes->PizzaSize as $size ): ?>
			<th><?= $size->title ?></th>
			<?php endforeach; ?>
		</tr>
	</thead>
	<tbody>
		<?php foreach( $flavors->PizzaFlavor as $flavor ): ?>
		<tr>
			<td><?= $flavor->title ?></td>
			<td><?= $flavor->ingredients ?></td>

			<?php foreach( $flavor->Price as $price ): ?>
			<td><?= $this->FrontEnd->cash( $price->value ) ?></td>
			<?php endforeach; ?>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<h1>Bordas Recheadas</h1>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Sabores</th>
			<?php foreach( $sizes->PizzaSize as $size ): ?>
			<th><?= $size->title ?></th>
			<?php endforeach; ?>
		</tr>
	</thead>
	<tbody>
		<?php foreach( $borders->PizzaBorder as $border ): ?>
		<tr>
			<td><?= $border->title ?></td>

			<?php foreach( $border->Price as $price ): ?>
			<td><?= $this->FrontEnd->cash( $price->value ) ?></td>
			<?php endforeach; ?>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>