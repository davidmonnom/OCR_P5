<?php

class User{
    private $_id;
    private $_firstName;
    private $_lastName;
    private $_username;
    private $_password;
    private $_creationDate;
    private $_isAdmin;

    public function __construct($id, $firstName, $lastName, $username, $password, $creationDate, $isAdmin){
        $this->setId($id);
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setUserName($username);
        $this->setPassword($password);
        $this->setCreationDate($creationDate);
        $this->setIsAdmin($isAdmin);
    }

	public function id(){
		return $this->_id;
	}

	public function setId($_id){
		$this->_id = $_id;
	}

	public function firstName(){
		return $this->_firstName;
	}

	public function setFirstName($_firstName){
		$this->_firstName = $_firstName;
	}

	public function lastName(){
		return $this->_lastName;
	}

	public function setLastName($_lastName){
		$this->_lastName = $_lastName;
	}

	public function userName(){
		return $this->_username;
	}

	public function setUserName($_username){
		$this->_username = $_username;
	}

	public function password(){
		return $this->_password;
	}

	public function setPassword($_password){
		$this->_password = $_password;
	}

	public function creationDate(){
		return $this->_creationDate;
	}

	public function setCreationDate($_creationDate){
		$this->_creationDate = $_creationDate;
	}

	public function isAdmin(){
		return $this->_isAdmin;
	}

	public function setIsAdmin($_isAdmin){
		$this->_isAdmin = $_isAdmin;
	}
}