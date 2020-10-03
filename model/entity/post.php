<?php
class Post {
    private $_id;
    private $_idUser;
    private $_title;
    private $_subject;
    private $_description;
    private $_creationDate;
    private $_modifyDate;
    private $_isVerified;

    public function __construct($id, $idUser, $title, $subject, $description, $creationDate, $modifyDate, $isVerified){
        $this->setId($id);
        $this->setIdUser($idUser);
        $this->setTitle($title);
        $this->setSubject($subject);
        $this->setDescription($description);
        $this->setCreationDate($creationDate);
        $this->setModifyDate($modifyDate);
        $this->setIsVerified($isVerified);
    }
    
    public function id(){
		return $this->_id;
	}

	public function setId($_id){
		$this->_id = $_id;
	}

	public function idUser(){
		return $this->_idUser;
	}

	public function setIdUser($_idUser){
		$this->_idUser = $_idUser;
	}

	public function title(){
		return $this->_title;
	}

	public function setTitle($_title){
		$this->_title = $_title;
	}

	public function subject(){
		return $this->_subject;
	}

	public function setSubject($_subject){
		$this->_subject = $_subject;
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

	public function modifyDate(){
		return $this->_modifyDate;
	}

	public function setModifyDate($_modifyDate){
		$this->_modifyDate = $_modifyDate;
	}

	public function isVerified(){
		return $this->_isVerified;
	}

	public function setIsVerified($_isVerified){
		$this->_isVerified = $_isVerified;
	}
}