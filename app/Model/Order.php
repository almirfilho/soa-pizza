<?php

class Order extends AppModel {

	/*----------------------------------------
	 * Attributes
	 ----------------------------------------*/

	public $name = 'Order';

	public $label = 'Pedido';

	public $status = array( 'O' => 'Em aberto', 'C' => 'Concluído', 'F' => 'Cancelado' );

	/*----------------------------------------
	 * Associations
	 ----------------------------------------*/

	public $hasMany = array( 'Pizza' => array( 'dependent' => true ) );
	
}