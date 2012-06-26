<?php

class BordersController extends AppController {

	/*----------------------------------------
	 * Atributtes
	 ----------------------------------------*/
	
	public $name	= "Borders";
	
	public $setMenu = "Borders";

	public $label	= 'Tamanho';
	
	public $submenu	= array( 'index', 'add' );
	
	/*----------------------------------------
	 * Actions
	 ----------------------------------------*/
	
	public function index(){

		$this->checkAccess( $this->name, __FUNCTION__ );
		$this->paginate[ 'order' ] = "Border.title ASC";
		$this->set( "borders", $this->paginate( "Border" ) );
	}
	
	public function view( $id = null ){
			
		$this->checkAccess( $this->name, __FUNCTION__ );
		$border = $this->Border->findById( $id );
		$this->checkResult( $border, 'Border' );
		$this->set( "border", $border );
	}
	
	public function add(){
		
		$this->checkAccess( $this->name, __FUNCTION__ );
		
		if( $this->request->isPost() ){
			
			$this->Border->create( $this->request->data );
			
			if( $this->Border->validates() ){
				
				if( $this->Border->save( null, false ) ){
					
					$this->setMessage( 'saveSuccess', 'Border' );
					$this->redirect( array( 'controller' => $this->name, 'action' => 'view', $this->Border->id ) );
					
				} else				
					$this->setMessage( 'saveError', 'Border' );
				
			} else				
				$this->setMessage( 'validateError' );
		}
	}
	
	public function edit( $id = null ){
		
		$this->checkAccess( $this->name, __FUNCTION__ );

		if( !$this->request->isPut() ){

			$this->Border->contain();
			$this->data = $this->Border->findById( $id );

		} else {
			
			$this->Border->create( $this->request->data );
			
			if( $this->Border->validates() ){
						
				if( $this->Border->save( null, false ) ){
					
					$this->setMessage( 'saveSuccess', 'Border' );
					$this->redirect( array( 'controller' => $this->name, 'action' => 'view', $id ) );
					
				} else
					$this->setMessage( 'saveError', 'Border' );
				
			} else
				$this->setMessage( 'validateError' );
		}
	}
	
	public function delete( $id = null ){
		
		$this->checkAccess( $this->name, __FUNCTION__ );
		
		if( $this->Border->delete( $id ) )
			$this->setMessage( 'deleteSuccess', 'Border' );
		else
			$this->setMessage( 'saveError', 'Border' );
			
		$this->redirect( array( 'controller' => $this->name, 'action' => 'index' ) );
	}
	
}