<?php

class Comment {
    private $_id;
    private $_idPost;
    private $_idUser;
    private $_description;
    private $_creationDate;
    private $_isVerified;

    public function __construct($id, $idPost, $idUser, $description, $creationDate, $isVerified){
        $this->setId($id);
        $this->setIdPost($idPost);
        $this->setIdUser($idUser);
        $this->setDescription($description);
        $this->setCreationDate($creationDate);
        $this->setIsVerified($isVerified);
	}
	
	public function id(){
		return $this->_id;
	}

	public function setId($_id){
		$this->_id = $_id;
	}

	public function idPost(){
		return $this->_idPost;
	}

	public function setIdPost($_idPost){
		$this->_idPost = $_idPost;
	}

	public function idUser(){
		return $this->_idUser;
	}

	public function setIdUser($_idUser){
		$this->_idUser = $_idUser;
	}

	public function description(){
		return $this->_description;
	}

	public function setDescription($_description){
		$this->_description = $_description;
	}

	public function creationDate(){
		return $this->_creationDate;
	}

	public function setCreationDate($_creationDate){
		$this->_creationDate = $_creationDate;
	}

	public function isVerified(){
		return $this->_isVerified;
	}

	public function setIsVerified($_isVerified){
		$this->_isVerified = $_isVerified;
	}
}