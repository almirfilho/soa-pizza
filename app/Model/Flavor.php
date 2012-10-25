<?php

class Flavor extends AppModel {
	
	/*----------------------------------------
	 * Atributtes
	 ----------------------------------------*/ 

	public $name  = 'Flavor';

	public $label = 'Sabor';

	/*----------------------------------------
	 * Associations
	 ----------------------------------------*/ 
	
	// public $hasAndBelongsToMany = array( 'Area' );
	
	// public $hasMany 			= array( 'User' );
	
	/*----------------------------------------
	 * Validation
	 ----------------------------------------*/
	
	public $validate = array(
	
		'title' => array(
			
			'rule'		=> 'notEmpty',
			'message'	=> 'Preencha Nome'
		),

		'ingredients' => array(
			
			'rule'		=> 'notEmpty',
			'message'	=> 'Preencha Ingredientes'
		),

		'price' => array(

			'notEmpty' => array(
				'rule'		=> 'notEmpty',
				'message'	=> 'Preencha Preço'
			),

			'numeric' => array(
				'rule'		=> 'numeric',
				'message'	=> 'Número inválido'
			)
		)
	);
	
}