<?php
require_once('model/entity/comment.php');

class CommentManager {
    private function buildFromRow($row){
		$creationDate = DateTime::createFromFormat('Y-m-d H:i:s', $row->creationDate);
		return new Comment($row->id, $row->idPost, $row->idUser, $row->description, $creationDate, $row->isVerified);
	}

	public function getComments(){
		$prepare = Database::getInstance()->prepare("SELECT * FROM comment"); 
		$prepare->execute();

		$commentsList = array();
		while ($row = $prepare->fetch(PDO::FETCH_OBJ)) {
			$commentsList[] = $this->buildFromRow($row);
		}

		return $commentsList;
	}

	public function getUnverifiedComments(){
		$prepare = Database::getInstance()->prepare("SELECT * FROM comment WHERE isVerified='0'"); 
		$prepare->execute();

		$commentsList = array();
		while ($row = $prepare->fetch(PDO::FETCH_OBJ)) {
			$commentsList[] = $this->buildFromRow($row);
		}

		print_r($commentsList);

		return $commentsList;
	}
	
    public function getById($id){
		$prepare = Database::getInstance()->prepare("SELECT * FROM comment WHERE id = ?"); 
		$prepare->execute(array($id));

		if($row = $prepare->fetch()){
			return $this->buildFromRow($row);
		}else{
			return false;
		}
	}
	
    public function getByIdPost($idPost){
		$prepare = Database::getInstance()->prepare("SELECT * FROM comment WHERE idPost = ?"); 
		$prepare->execute(array($idPost));

		$commentsList = array();
		while ($row = $prepare->fetch(PDO::FETCH_OBJ)) {
			$commentsList[] = $this->buildFromRow($row);
		}

		return $commentsList;
    }
}
