<?php

class FlavorsController extends AppController {

	/*----------------------------------------
	 * Atributtes
	 ----------------------------------------*/
	
	public $name	= "Flavors";
	
	public $setMenu = "Flavors";

	public $label	= 'Sabores';
	
	public $submenu	= array( 'index', 'add' );
	
	/*----------------------------------------
	 * Actions
	 ----------------------------------------*/
	
	public function index(){

		$this->checkAccess( $this->name, __FUNCTION__ );
		$this->paginate[ 'fields' ] = array( 'id', 'title', 'price' );
		$this->paginate[ 'order' ] = "Flavor.title ASC";
		$this->set( "flavors", $this->paginate( "Flavor" ) );
	}
	
	public function view( $id = null ){
			
		$this->checkAccess( $this->name, __FUNCTION__ );
		$flavor = $this->Flavor->findById( $id );
		$this->checkResult( $flavor, 'Flavor' );
		$this->set( "flavor", $flavor );
	}
	
	public function add(){
		
		$this->checkAccess( $this->name, __FUNCTION__ );
		
		if( $this->request->isPost() ){
			
			$this->Flavor->create( $this->request->data );
			
			if( $this->Flavor->validates() ){
				
				if( $this->Flavor->save( null, false ) ){
					
					$this->setMessage( 'saveSuccess', 'Flavor' );
					$this->redirect( array( 'controller' => $this->name, 'action' => 'view', $this->Flavor->id ) );
					
				} else				
					$this->setMessage( 'saveError', 'Flavor' );
				
			} else				
				$this->setMessage( 'validateError' );
		}
	}
	
	public function edit( $id = null ){
		
		$this->checkAccess( $this->name, __FUNCTION__ );

		if( !$this->request->isPut() ){

			$this->Flavor->contain();
			$this->data = $this->Flavor->findById( $id );

		} else {
			
			$this->Flavor->create( $this->request->data );
			
			if( $this->Flavor->validates() ){
						
				if( $this->Flavor->save( null, false ) ){
					
					$this->setMessage( 'saveSuccess', 'Flavor' );
					$this->redirect( array( 'controller' => $this->name, 'action' => 'view', $id ) );
					
				} else
					$this->setMessage( 'saveError', 'Flavor' );
				
			} else
				$this->setMessage( 'validateError' );
		}
	}
	
	public function delete( $id = null ){
		
		$this->checkAccess( $this->name, __FUNCTION__ );
		
		if( $this->Flavor->delete( $id ) )
			$this->setMessage( 'deleteSuccess', 'Flavor' );
		else
			$this->setMessage( 'saveError', 'Flavor' );
			
		$this->redirect( array( 'controller' => $this->name, 'action' => 'index' ) );
	}
	
}