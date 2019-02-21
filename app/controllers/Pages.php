<?php 


class Pages extends Controller{

	public function __construct() {
		
	}


	public function about() {

				$data = ['title' => 'About Us',
				'description' => ' A simple  PHP MVC application'] ;

		
		$this->view('pages/about', $data) ;


	}

	public function index() {

		$data = ['title' => 'Welcome', 
		'description' => ' A simple handmade MVC '
		] ;

		$this->view('pages/index', $data );


	}

}