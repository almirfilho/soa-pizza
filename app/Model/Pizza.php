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

	public $belongsTo = array( 'Order' => array( 'counterCache' => 'items' ), 'Size', 'Flavor', 'Border' );

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

		$response = new StdClass();
		
		if( empty( $inputParam ) ){

			$response->success = false;
			$response->message = 'Falta de parâmetros';
			return $response;

		} elseif( empty( $inputParam->Delivery ) ) {

			$response->success = false;
			$response->message = 'Falta de parâmetros (Delivery)';
			return $response;

		} elseif( empty( $inputParam->PizzaItem ) ){

			$response->success = false;
			$response->message = 'Falta de parâmetros (PizzaItem)';
			return $response;
		}

		$order = array(	
			'Pizza' => array(),
			'Order' => array(
				'delivery_name' => $inputParam->Delivery->name,
				'delivery_address' => $inputParam->Delivery->address,
				'delivery_phone' => $inputParam->Delivery->phone
		) );

		$totalPrice = 0;

		if( !is_array( $inputParam->PizzaItem ) )
			$inputParam->PizzaItem = array( $inputParam->PizzaItem );

		foreach( $inputParam->PizzaItem as $pizza ){

			$this->Flavor->id = $pizza->flavorId;
			$priceFlavor = $this->Flavor->field( 'price' );

			$this->Border->id = $pizza->borderId;
			$priceBorder = $this->Border->field( 'price' );

			$this->Size->id = $pizza->sizeId;
			$sizeFactor = $this->Size->field( 'factor' );

			$price = $sizeFactor * ($priceFlavor + $priceBorder);
			$totalPrice += $price;

			$order[ 'Pizza' ][] = array(
				'flavor_id' => $pizza->flavorId,
				'size_id' => $pizza->sizeId,
				'border_id' => $pizza->borderId,
				'price' => $price
			);
		}

		$order[ 'Order' ][ 'total_price' ] = $totalPrice;
		$this->Order->create( $order );
		
		if( $this->Order->saveAll($order) ){

			$response->success = true;
			$response->orderId = $this->Order->id;
			$response->message = 'Seu pedido foi realizado com sucesso.';

		} else {

			$response->success = false;
			$response->message = 'Ocorreu um erro ao tentar realizar seu pedido. Por favor tente novamente.';
		}

		return $response;
	}

	public function getSizes($inputParam = null) {
	
		$result = new StdClass();
		$result->PizzaSize = array();

		$sizes = $this->Size->find( 'all', array( 'order' => 'factor' ) );

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