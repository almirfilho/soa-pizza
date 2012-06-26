<h1>Pizzas</h1>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Sabores</th>
			<th>Ingredientes</th>
			<th>Pequena</th>
			<th>Média</th>
			<th>Grande</th>
			<th>Gigante</th>
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
<? //debug($flavors); ?>

<h1>Bordas Recheadas</h1>
<table class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Sabores</th>
			<th>Pequena</th>
			<th>Média</th>
			<th>Grande</th>
			<th>Gigante</th>
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
<? //debug($borders); ?>