<?php

class Size extends AppModel {
	
	/*----------------------------------------
	 * Atributtes
	 ----------------------------------------*/ 

	public $name  = 'Size';

	public $label = 'Tamanho';

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

		'factor' => array(

			'notEmpty' => array(
				'rule'		=> 'notEmpty',
				'message'	=> 'Preencha Fator de preço'
			),

			'numeric' => array(
				'rule'		=> 'numeric',
				'message'	=> 'Número inválido'
			)
		)
	);
	
}