<?php

App::import( 'model', 'Pizza' );

class WebServiceController extends AppController {

	/*----------------------------------------
	 * Atributtes
	 ----------------------------------------*/

	public $components = array('RequestHandler');

	public $uses = array( 'Border', 'Flavor', 'Size' );

	/*----------------------------------------
	 * Callbacks
	 ----------------------------------------*/

	public function beforeFilter(){

		$this->Auth->allow('index','service');
	}

	/*----------------------------------------
	 * Actions
	 ----------------------------------------*/

	public function index(){

		$this->layout = false;
		Configure::write('debug', 0);
		$this->RequestHandler->respondAs('xml');
	}

	public function service(){

		$this->layout = false;
		$this->autoRender = false;
		Configure::write('debug', 0);
		ini_set("soap.wsdl_cache_enabled", "0"); // disabling WSDL cache
		$server = new SoapServer( Configure::read( 'wsdlUrl') );
		$server->setClass("Pizza");
		$server->handle();
	}

}