<?php

class Pizza extends AppModel {

	/*----------------------------------------
	 * Attributes
	 ----------------------------------------*/

	public $name = 'Pizza';

	public $label = 'Pizza';

	public $gender = 'a';

	/*----------------------------------------
	 * Associations
	 ----------------------------------------*/

	public $belongsTo = array( 'Size', 'Flavor', 'Border' );

	/*----------------------------------------
	 * Private Methods
	 ----------------------------------------*/

	private function PizzaSize( &$size ){

		$pizzaSize = new StdClass();
		$pizzaSize->id = $size[ 'Size' ][ 'id' ];
		$pizzaSize->title = $size[ 'Size' ][ 'title' ];
		return $pizzaSize;
	}

	private function PizzaBorder( &$border ){

		$pizzaBorder = new StdClass();
		$pizzaBorder->id = $border[ 'Border' ][ 'id' ];
		$pizzaBorder->title = $border[ 'Border' ][ 'title' ];
		return $pizzaBorder;
	}

	private function PizzaFlavor( &$flavor ){

		$pizzaFlavor = new StdClass();
		$pizzaFlavor->id = $flavor[ 'Flavor' ][ 'id' ];
		$pizzaFlavor->title = $flavor[ 'Flavor' ][ 'title' ];
		$pizzaFlavor->ingredients = $flavor[ 'Flavor' ][ 'ingredients' ];
		return $pizzaFlavor;
	}

	/*----------------------------------------
	 * SOAP Services
	 ----------------------------------------*/

	public function orderPizza($inputParam = null){

		// if( $inputParam ){
			// $i = print_r($inputParam,true);
			// $this->query("INSERT INTO tests (string) VALUES ('{$i}')");
		// }



		// return 'teste feito';
		return print_r($inputParam,true);
	}

	public function getSizes($inputParam = null) {
	
		$result = new StdClass();
		$result->PizzaSize = array();

		$sizes = $this->Size->find( 'all' );

		foreach( $sizes as $size )
			$result->PizzaSize[] = $this->PizzaSize( $size );
	
		return $result;
	}

	public function getBorders($inputParam = null) {
	
		$result = new StdClass();
		$result->PizzaBorder = array();

		$borders = $this->Border->find( 'all', array( 'order' => 'title' ) );
		$sizes = $this->Size->find( 'all', array( 'order' => 'factor' ) );

		foreach( $borders as $border ){
			
			$pizzaBorder = $this->PizzaBorder( $border );
			$pizzaBorder->Price = array();

			foreach( $sizes as $size )				
				$pizzaBorder->Price[] = array( 
					'PizzaSize' => $this->PizzaSize( $size ), 
					'value' => $border[ 'Border' ][ 'price' ] * $size[ 'Size' ][ 'factor' ]
				);

			$result->PizzaBorder[] = $pizzaBorder;
		}
	
		return $result;
	}

	public function getFlavors($inputParam = null) {
	
		$result = new StdClass();
		$result->PizzaFlavor = array();

		$flavors = $this->Flavor->find( 'all', array( 'order' => 'title' ) );
		$sizes = $this->Size->find( 'all', array( 'order' => 'factor' ) );

		foreach( $flavors as $flavor ){
			
			$pizzaFlavor = $this->PizzaFlavor( $flavor );
			$pizzaFlavor->Price = array();

			foreach( $sizes as $size )				
				$pizzaFlavor->Price[] = array( 
					'PizzaSize' => $this->PizzaSize( $size ), 
					'value' => $flavor[ 'Flavor' ][ 'price' ] * $size[ 'Size' ][ 'factor' ]
				);

			$result->PizzaFlavor[] = $pizzaFlavor;
		}
	
		return $result;
	}
}