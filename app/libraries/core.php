<?php 

// App Core class
// creates ULR and loads core //controller

// URL format  /controller/method/params

class Core {

	// define a default controller
	protected $currentController = 'Pages' ;

	// define a default method
	protected $currentMethod = "index" ;
	// define default parameters
	protected $params = [] ;


public function __construct() {
	$url = $this->getUrl() ;

	// look in controllers for first value in $url

	if (file_exists('../app/controllers/'.ucwords($url[0]).'.php')) {
		
		$this->currentController = ucwords($url[0]) ;


		// unset the zero index

		unset($url[0]) ; 

	}

	// require the controller


	require_once '../app/controllers/'.$this->currentController.'.php';

	// instantiate the controller class


	$this->currentController = new $this->currentController;
}

	public function getUrl() {

		if (isset($_GET["url"])) {
			
			// strip ending slash

			$url = rtrim($_GET['url'], '/') ;

			// sanitize url

			$url = filter_var($url, FILTER_SANITIZE_URL) ;

			// explode the array  

			$url = explode('/', $url) ;

			return $url ;


		}


	}



}