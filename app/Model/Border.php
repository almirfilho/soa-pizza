<?php

class Border extends AppModel {
	
	/*----------------------------------------
	 * Atributtes
	 ----------------------------------------*/ 

	public $name  = 'Border';

	public $label = 'Borda';

	public $gender = 'a';

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