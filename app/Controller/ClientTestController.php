<?php

class ClientTestController extends AppController {

	/*----------------------------------------
	 * Atributtes
	 ----------------------------------------*/

	public $name = 'ClientTest';

	public $uses = array( 'Test' );

	// private $activeMenu = null;

	/*----------------------------------------
	 * Callbacks
	 ----------------------------------------*/

	public function beforeRender(){

		$this->layout = 'client';
		$this->set( 'active', $this->action );
	}

	public function beforeFilter(){

		$this->Auth->allow();
	}

	/*----------------------------------------
	 * Actions
	 ----------------------------------------*/

	public function index(){

		ini_set("soap.wsdl_cache_enabled", "0");

	    $client = new SoapClient("http://localhost/ufma/soa-pizza/WebService");
	    
	    $this->set( 'flavors', $client->getFlavors() );
	    $this->set( 'borders', $client->getBorders() );
	}

	public function shop(){
		ini_set("soap.wsdl_cache_enabled", "0");

	    $client = new SoapClient("http://localhost/ufma/soa-pizza/WebService");
	    
	    // debug( $client->getSizes(array('adas' => 'testeaa')) );
	    debug( $client->orderPizza( array(
	    	'Delivery' => array(
		    	'name' => 'almir',
		    	'address' => 'rua la al assadasdas',
		    	'phone' => '1231-3123' ),
		    'PizzaItem' => array( 
		    	array( 'flavorId' => '12', 'sizeId' => '22', 'borderId' => '21' ),
		    	array( 'flavorId' => '12', 'sizeId' => '22', 'borderId' => '21222' )
	    ) ) ) );

	    // $t = $this->Test->find( 'first', array( 'order' => 'id DESC'));
	    // debug($t['Test'][ 'string']);
	    // $var = array( 'dada' => 'dasdas');
	    // debug($var);
	    // $var = print_r($var,true);
	    // debug(print_r($var,true));
	    // print $var;
	}

}