<?php $this->Html->script( 'jquery.maskedinput.min', false ) ?>
<div class="row">
<div id="catalog-order" class="span8">
	<?= $this->FrontEnd->message() ?>
	<h1>Escolha sua pizza</h1>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th class="pizza">Sabores</th>
				<?php foreach( $sizes->PizzaSize as $size ): ?>
				<th class="pizza-size" data-id="<?= $size->id ?>"><?= $size->title ?></th>
				<?php endforeach; ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach( $flavors->PizzaFlavor as $flavor ): ?>
			<tr>
				<td>
					<h3 class="pizza-sabor"><?= $flavor->title ?></h3>
					<p><?= $flavor->ingredients ?></p>
				</td>

				<?php foreach( $flavor->Price as $price ): ?>
				<td><label class="radio">
					<?= $this->Form->radio( 'Item.pizza', 
							array( "{$flavor->id}_{$price->PizzaSize->id}" => $this->FrontEnd->cash( $price->value ) ), 
							array( 
								'label' => false, 'hiddenField' => false, 'class' => 'pizza',
								'data-flavor-id' => $flavor->id,
								'data-size-id' => $price->PizzaSize->id ) ) ?>
				</label></td>
				<?php endforeach; ?>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<h1>Escolha a borda</h1>
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th class="pizza">Sabores</th>
				<?php foreach( $sizes->PizzaSize as $size ): ?>
				<th class="pizza-size"><?= $size->title ?></th>
				<?php endforeach; ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach( $borders->PizzaBorder as $border ): ?>
			<tr>
				<td class="borda-sabor"><?= $border->title ?></td>

				<?php foreach( $border->Price as $price ): ?>
				<td><label class="radio disabled">
					<?= $this->Form->radio( 'Item.border', 
						array( "{$flavor->id}_{$price->PizzaSize->id}" => $this->FrontEnd->cash( $price->value ) ), 
						array( 
							'label' => false, 'hiddenField' => false, 'class' => 'border',
							'disabled' => 'disabled',
							'data-size-id' => $price->PizzaSize->id,
							'data-border-id' => $border->id ) ) ?>
				</label></td>
				<?php endforeach; ?>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<div class="form-actions">
		<div class="pull-left">
			<h3>Sua pizza</h3>
			<ul>
				<li id="sua-pizza-sabor">Pizza: <span>Escolha sua pizza</span></li>
				<li id="sua-pizza-borda">Borda: <span>--</span></li>
				<li id="sua-pizza-total"><strong>TOTAL</strong>: R$ <span>0,00</span></li>
			</ul>
		</div>
		<?= $this->Form->button( '<i class="icon-plus icon-white"></i> Adicionar ao seu Pedido', array( 'class' => 'btn btn-success pull-right', 'id' => 'add' ) ) ?>
	</div>
</div>
<div id="order" class="span4">
	<h2>Seu pedido</h2>
	<div class="well">
		<div id="order-content">
			<?= $this->Form->create( 'Order' ) ?>
			<h3>Suas pizzas</h3>
			<div id="order-pizzas">Não há pizzas em seu pedido ainda</div>
			<p id="total-geral">TOTAL A PAGAR: R$ <span>0,00</span></p>
			<h3>Dados de entrega</h3>
			<div id="delivery">
			<?php
				print $this->Form->input( 'Order.name', array( 'label' => false, 'placeholder' => 'Seu nome' ) );
				print $this->Form->input( 'Order.address', array( 'label' => false, 'placeholder' => 'Seu endereço' ) );
				print $this->Form->input( 'Order.phone', array( 'label' => false, 'placeholder' => 'Seu telefone' ) );
				print $this->Form->button( 'Fazer Pedido <i class="icon-chevron-right icon-white"></i>', array( 'class' => 'btn btn-primary pull-right' ) );
			?>
			</div>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
Array.prototype.remove = function(from, to) {
  var rest = this.slice((to || from) + 1 || this.length);
  this.length = from < 0 ? this.length + from : from;
  return this.push.apply(this, rest);
};

$(document).ready( function(){

	var preco_pizza = 0;
	var preco_borda = 0;
	var total = 0;
	var flavor_id = null;
	var border_id = null;
	var size_id = null;
	var sabor_pizza = '';
	var sabor_borda = '';
	var items = [];
	var id = 0;

	$('input[type="radio"].pizza').change( function(){

		$('input[type="radio"].border').attr( 'disabled', true ).parent().addClass('disabled');
		$('input[type="radio"].border[data-size-id="'+ $(this).attr('data-size-id') +'"]').attr( 'disabled', false ).last().attr('checked', true);
		$('input[type="radio"].border[data-size-id="'+ $(this).attr('data-size-id') +'"]').parent().removeClass('disabled');
		
		flavor_id = $(this).attr('data-flavor-id');
		size_id = $(this).attr('data-size-id');
		preco_pizza = $(this).parents('label').children('span').text();
		size_pizza = $('.pizza-size[data-id="'+ size_id +'"]').text();
		sabor_pizza = $(this).parents('tr').find('.pizza-sabor').text() + ' ' + size_pizza + ' (R$ ' + preco_pizza + ')';
		$('#sua-pizza-sabor span').text( sabor_pizza );

		$('input[type="radio"].border[data-size-id="'+ $(this).attr('data-size-id') +'"]').change();
	});

	$('input[type="radio"].border').change( function(){
		
		preco_borda = $(this).parents('label').children('span').text();
		sabor_borda = $(this).parents('tr').find('.borda-sabor').text() + ' (R$ ' + preco_borda + ')';
		$('#sua-pizza-borda span').text( sabor_borda );
		// calcula total
		total = parseFloat(preco_pizza.replace( ',', '.' )) + parseFloat(preco_borda.replace( ',', '.' ));
		border_id = $(this).attr('data-border-id');
		$('#sua-pizza-total span').text( total.toFixed(2).replace('.', ',') );
	});

	$('#add').click( function(e){

		e.preventDefault();
		
		if( validates() ){

			newItem = {
				id: newId(),
				flavor_id: flavor_id,
				border_id: border_id,
				size_id: size_id,
				sabor_pizza: sabor_pizza,
				sabor_borda: sabor_borda,
				total: total
			};

			if( items.length == 0 )
				$('#order-pizzas').text('');

			items.push( newItem );

			var newItemElement = '<div class="item" data-id="'+ newItem.id +'"><a href="#" class="pull-right">&times;</a><ul>';
			newItemElement += '<li><strong>Pizza</strong>: '+ newItem.sabor_pizza +'</li>';
			newItemElement += '<li><strong>Borda</strong>: '+ newItem.sabor_borda +'</li>';
			newItemElement += '<li><strong>Valor</strong>: R$ '+ newItem.total.toFixed(2).replace('.', ',') +'</li></ul>';
			newItemElement += '<input type="hidden" name="data[Order][Item]['+ newItem.id +'][flavor_id]" value="'+ newItem.flavor_id +'" />';
			newItemElement += '<input type="hidden" name="data[Order][Item]['+ newItem.id +'][border_id]" value="'+ newItem.border_id +'" />';
			newItemElement += '<input type="hidden" name="data[Order][Item]['+ newItem.id +'][size_id]" value="'+ newItem.size_id +'" />';
			newItemElement += '</div>';

			$('#order-pizzas').append(newItemElement);
			updateTotal();

		} else {

			message('Selecione sua pizza e tipo de borda e tente novamente.');
		}
	});

	$('.item a').live( 'click', function(e){
		
		e.preventDefault();
		remove_id = $(this).parent().attr('data-id');

		for( i=0; i<items.length; i++ ){
			if( items[i].id == remove_id ){
				items.remove(i);
				$('.item[data-id="'+ remove_id +'"]').remove();
			}
		}

		updateTotal();
	});

	$('#order form').submit( function(e){

		if( items.length == 0 ){

			message( 'Adicione alguma pizza primeiro!' );
			return false;
		}

		if( $('#OrderName').val() == '' || $('#OrderAddress').val() == '' || $('#OrderPhone').val() == '' || $('#OrderPhone').val() == '(__) ____-____' ){

			message( 'Preencha suas informações e tente novamente.' );
			return false;
		}

		return true;
	});

	$('#OrderPhone').mask('(99) 9999-9999');

	function message( str ){

		var message = '<div class="alert alert-error"><a class="close" data-dismiss="alert" href="#">×</a>';
		message += str;
		message += '</div>';

		$('#catalog-order').prepend( message );
		$(document).scrollTop(0);
	}

	function updateTotal(){

		var valorTotal = 0;

		for( i=0; i<items.length; i++ )
			valorTotal += items[i].total;
		
		$('#total-geral span').text( valorTotal.toFixed(2).replace('.', ',') );
	}

	function validates(){

		return flavor_id != null && size_id != null && border_id != null;
	}

	function newId(){

		id++;
		return id;
	}
});
</script>