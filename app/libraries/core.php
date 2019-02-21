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
	$this->getUrl() ;
}

	public function getUrl() {

		if (isset($_GET["url"])) {
			echo $_GET["url"] ; 
		}


	}



}