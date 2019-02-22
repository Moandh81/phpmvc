<?php 


class Users extends Controller {



	public function __construct() {

		// will load the model
		$this->userModel = $this->model('User');

	}


	public function register() {

		// check for POST request

		if ($_SERVER["REQUEST_METHOD"] == 'POST') {
			

			// sanitize  post data

			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING) ;


			// process form
			$data = [

				'name' => trim($_POST["name"]) ,
				'email' => trim($_POST["email"]) ,
				'password' => $_POST["password"] ,
				'confirm_password' => trim($_POST["confirm_password"]),
				'name_error' => '' ,
				'email_error' => '' ,
				'password_error' => '' ,
				'confirm_password_error' => '',


			] ;


			//  validate email

			if (empty($data['email'])) {
				$data['email_error'] = 'Please enter Email' ;

			} elseif ($this->userModel->findUserByEmail($data['email'])) { 
 	  

			 	  	// check if email alreay taken

			 	$data['email_error'] = 'Email already taken' ;

			

			}

			// valide the name 


			if (empty($data['name'])) {
				$data['name_error'] = 'Please enter the name' ;
			}


			// validate the password


			if (empty($data['password'])) {
				$data['password_error'] = 'Please enter the password' ;
			} elseif (strlen($data['password']) < 6)  {
				$data['password_error'] = 'The password must be at least 6 characters' ;
			}

			if (empty($data['confirm_password'])) {
				$data['confirm_password_error'] = "Please confirm password" ;
			} else if ( $data['confirm_password'] != $data['password']) {

				$data['confirm_password_error'] = "Passwords do not match" ;	
			}

			// make sure errors are empty 

			if (empty($data["email_error"]) &&
				empty($data["name_error"]) &&
				empty($data["password_error"]) &&
				empty($data["confirm_password_error"]) )
				  {

					// hash the password

					$data["password"] = password_hash($data["password"], PASSWORD_DEFAULT) ; 

					// call the model register

					if ($this->userModel->register($data)) {

						redirect('users/login') ;
					}

					else {

						die("something went wrong") ;
					}

				}

			else {
					$this->view('users/register', $data);
	
				}
			

		}

		else {

			// load form

			// init data 

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







public function login() {

		// check for POST  request

		if ($_SERVER["REQUEST_METHOD"] == 'POST') {
			// process form


		}

		else {

			// load form

			$data = [

				
				'email' => '' ,
				'password' => '' ,
				'email_error' => '' ,
				'password_error' => '' ,


			] ;

			//load view

			$this->view('users/login', $data);


		}
	}


}