<?php 


class User {


	private $db  ;


	public function __construct() {

		$this->db = new Database ;

	}

	// find user by email


	public function register($data) {

		$this->db->query('INSERT INTO users (name, email, password) VALUES(:name , :email , :password )') ;
			
		// binding the parameters


		$this->db->bind(':name', $data['name']) ;
		$this->db->bind(':email', $data['email']) ;
		$this->db->bind(':password', $data['password']) ;

		// execute the query 

		if($this->db->execute()) {
			
			return true ;
		}

		else {

			return false ;
		}

	}


	public function findUserByEmail($email) {

		$this->db->query('SELECT * FROM users WHERE email = :email ') ;

		$this->db->bind(':email', $email) ;

		$row = $this->db->single();


		// check row

		if($this->db->rowCount() > 0) {
					return true ;
		}

		else {

			return false ;
		}
	}

}