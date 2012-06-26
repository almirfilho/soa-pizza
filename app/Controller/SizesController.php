<?php

class SizesController extends AppController {

	/*----------------------------------------
	 * Atributtes
	 ----------------------------------------*/
	
	public $name	= "Sizes";
	
	public $setMenu = "Sizes";

	public $label	= 'Tamanho';
	
	public $submenu	= array( 'index', 'add' );
	
	/*----------------------------------------
	 * Actions
	 ----------------------------------------*/
	
	public function index(){

		$this->checkAccess( $this->name, __FUNCTION__ );
		$this->paginate[ 'order' ] = "Size.factor ASC";
		$this->set( "sizes", $this->paginate( "Size" ) );
	}
	
	public function view( $id = null ){
			
		$this->checkAccess( $this->name, __FUNCTION__ );
		$size = $this->Size->findById( $id );
		$this->checkResult( $size, 'Size' );
		$this->set( "size", $size );
	}
	
	public function add(){
		
		$this->checkAccess( $this->name, __FUNCTION__ );
		
		if( $this->request->isPost() ){
			
			$this->Size->create( $this->request->data );
			
			if( $this->Size->validates() ){
				
				if( $this->Size->save( null, false ) ){
					
					$this->setMessage( 'saveSuccess', 'Size' );
					$this->redirect( array( 'controller' => $this->name, 'action' => 'view', $this->Size->id ) );
					
				} else				
					$this->setMessage( 'saveError', 'Size' );
				
			} else				
				$this->setMessage( 'validateError' );
		}
	}
	
	public function edit( $id = null ){
		
		$this->checkAccess( $this->name, __FUNCTION__ );

		if( !$this->request->isPut() ){

			$this->Size->contain();
			$this->data = $this->Size->findById( $id );

		} else {
			
			$this->Size->create( $this->request->data );
			
			if( $this->Size->validates() ){
						
				if( $this->Size->save( null, false ) ){
					
					$this->setMessage( 'saveSuccess', 'Size' );
					$this->redirect( array( 'controller' => $this->name, 'action' => 'view', $id ) );
					
				} else
					$this->setMessage( 'saveError', 'Size' );
				
			} else
				$this->setMessage( 'validateError' );
		}
	}
	
	public function delete( $id = null ){
		
		$this->checkAccess( $this->name, __FUNCTION__ );
		
		if( $this->Size->delete( $id ) )
			$this->setMessage( 'deleteSuccess', 'Size' );
		else
			$this->setMessage( 'saveError', 'Size' );
			
		$this->redirect( array( 'controller' => $this->name, 'action' => 'index' ) );
	}
	
}