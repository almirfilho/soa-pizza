<?php

class OrdersController extends AppController {

	/*----------------------------------------
	 * Atributtes
	 ----------------------------------------*/
	
	public $name	= "Orders";
	
	public $setMenu = "Orders";

	public $label	= 'Pedidos';
	
	public $submenu	= array( 'index', 'all' );

	// public $component = array( 'RequestHandler' );
	
	/*----------------------------------------
	 * Actions
	 ----------------------------------------*/
	
	public function index(){

		$this->checkAccess( $this->name, __FUNCTION__ );
		$this->paginate[ 'fields' ] = array( 'id', 'delivery_name', 'total_price', 'created', 'status' );
		$this->paginate[ 'order' ] = "Order.created DESC";
		$this->paginate[ 'conditions' ] = array( 'Order.status' => 'O' );
		$this->set( array( 
			'status' => $this->Order->status,
			"orders" => $this->paginate( "Order" ), 
			'_serialize' => array('orders')
		) );
	}

	public function all(){

		$this->checkAccess( $this->name, __FUNCTION__ );
		$this->paginate[ 'fields' ] = array( 'id', 'delivery_name', 'total_price', 'created', 'status' );
		$this->paginate[ 'order' ] = "Order.created DESC";
		$this->set( "orders", $this->paginate( "Order" ) );
		$this->set( 'status', $this->Order->status );
	}
	
	public function view( $id = null ){
			
		$this->checkAccess( $this->name, __FUNCTION__ );
		$order = $this->Order->find( 'first', array(
			'conditions' => array( 'Order.id' => $id ),
			'contain' => array( 
				'Pizza' => array( 'Flavor.title', 'Size.title', 'Border.title' )
		) ) );
		$this->checkResult( $order, 'Order' );
		$this->set( array(
			'status' => $this->Order->status,
			"order" => $order,
			'_serialize' => array( 'order' )
		) );
	}

	public function mark( $id = null, $status = null ){

		$this->checkAccess( $this->name, 'edit' );
		$this->Order->id = $id;

		if( $this->Order->saveField( 'status', $status ) )
			$this->setMessage( 'saveSuccess', 'Order' );
		else
			$this->setMessage( 'saveError', 'Order' );

		$this->redirect( array( 'controller' => $this->name, 'action' => 'view', $id ) );
	}
	
}