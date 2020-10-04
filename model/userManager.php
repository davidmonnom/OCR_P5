<?php
require_once('model/entity/user.php');

class UserManager {
	private function buildFromRow($row){
		$creationDate = DateTime::createFromFormat('Y-m-d H:i:s', $row->creationDate);
		return new User($row->id, $row->firstname, $row->lastname, $row->username, $row->password, $creationDate, $row->isAdmin);
	}

	public function getById($id){
		$prepare = Database::getInstance()->prepare("SELECT * FROM user WHERE id = ?"); 
		$prepare->execute(array($id));

		if($row = $prepare->fetch(PDO::FETCH_OBJ)){
			return $this->buildFromRow($row);
		}else{
			return false;
		}
	}

	public function getByUsername($username){
		$prepare = Database::getInstance()->prepare("SELECT * FROM user WHERE username = ?"); 
		$prepare->execute(array($username));

		if($row = $prepare->fetch(PDO::FETCH_OBJ)){
			return $this->buildFromRow($row);
		}else{
			return false;
		}
	}

	public function add($user){ // It ignores the "id" of the User obj
		$prepare = Database::getInstance()->prepare("INSERT INTO user(firstname, lastname, username, password, creationDate, isAdmin) VALUES(?, ?, ?, ?, ?, ?)"); 
		return $prepare->execute(array($user->firstName(), $user->lastName(), $user->userName(), $user->password(), $user->creationDate()->format('Y-m-d H:i:s'), $user->isAdmin()));
	}
}