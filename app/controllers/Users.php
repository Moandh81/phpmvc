<?php 


class Users extends Controller {



	public function __construct() {


	}


	public function register() {

		// check for POST  request

		if ($_SERVER["REQUEST_METHOD"] == 'POST') {
			// process form


		}

		else {

			// load form

			$data = [

				'name' => '' ,
				'email' => '' ,
				'password' => '' ,
				'confirm_password' => '',
				'name_error' => '' ,
				'email_error' => '' ,
				'password_error' => '' ,
				'confirm_password_error' => '',


			] ;

			//load view

			$this->view('users/register', $data);


		}
	}


public function index() {


		$this->view('users/login' );


	}




}