<?php 

// base controller
// loads models and views


class Controller {

	// load model


	public function model($model) {

		// require the model file


		require_once '../app/models/'.$model.'.php';


		// instantiate the model


		return new $model();

	}


	// load view


	public function view($view, $data = []) {

		// require the view file

		if (file_exists('../app/views/'.$view.'.php')) {
			require_once '../app/views/'.$view.'.php' ;	
		}

		else {
			// View does not exist
			die("View does not exist");
		}

		
	}
}

 ?>