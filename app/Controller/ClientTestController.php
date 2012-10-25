<?php

class ClientTestController extends AppController {

	/*----------------------------------------
	 * Atributtes
	 ----------------------------------------*/

	public $name = 'ClientTest';

	public $uses = array( 'Pizza' );

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
		$this->set( 'sizes', $client->getSizes() );
	}

	public function shop(){

		ini_set("soap.wsdl_cache_enabled", "0");
	    $client = new SoapClient("http://localhost/ufma/soa-pizza/WebService");
		$this->set( 'flavors', $client->getFlavors() );
		$this->set( 'borders', $client->getBorders() );
		$this->set( 'sizes', $client->getSizes() );

		if( $this->request->isPost() ){

			$data = $this->request->data;

			$order = array(
				'PizzaItem' => array(),
		    	'Delivery' => array(
			    	'name' => $data[ 'Order' ][ 'name' ],
			    	'address' => $data[ 'Order' ][ 'address' ],
			    	'phone' => $data[ 'Order' ][ 'phone' ] )
			);

			foreach( $data[ 'Order' ][ 'Item' ] as $item )
				$order[ 'PizzaItem' ][] = array(
					'flavorId' => $item[ 'flavor_id' ],
					'sizeId' => $item[ 'size_id' ],
					'borderId' => $item[ 'border_id' ]
				);
			
			$response = $client->orderPizza( $order );

			if( $response->success )
				$this->redirect( array( 'controller' => $this->name, 'action' => 'success', $response->orderId ) );
			else
				$this->Session->setFlash( $response->message, 'default', array( 'class' => 'error' ) );
		}
	}

	public function success( $order_id = null ){

		if( $order_id )
			$this->set( 'order', $this->Pizza->Order->find( 'first', array(
				'conditions' => array( 'Order.id' => $order_id ),
				'contain' => array( 
					'Pizza' => array( 'Flavor.title', 'Size.title', 'Border.title' ) 
			) ) ) );

		else
			$this->redirect( array( 'controller' => $this->name, 'action' => 'index' ) );
	}

}