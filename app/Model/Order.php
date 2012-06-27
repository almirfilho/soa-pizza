<?php

class Order extends AppModel {

	/*----------------------------------------
	 * Attributes
	 ----------------------------------------*/

	public $name = 'Order';

	/*----------------------------------------
	 * Associations
	 ----------------------------------------*/

	public $hasMany = array( 'Pizza' => array( 'dependent' => true ) );
	
}