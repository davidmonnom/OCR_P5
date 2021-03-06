<?php
require_once('model/entity/comment.php');

class CommentManager {
    private function buildFromRow($row){ //build row
		$creationDate = DateTime::createFromFormat('Y-m-d H:i:s', $row->creationDate);
		return new Comment($row->id, $row->idPost, $row->idUser, $row->description, $creationDate, $row->isVerified); //create object
	}

	public function add($comment){  //add 
		$prepare = Database::getInstance()->prepare("INSERT INTO comment(idPost, idUser, description, creationDate, isVerified) VALUES(?, ?, ?, ?, ?)"); 
		return $prepare->execute(array($comment->idPost(), $comment->idUser(), $comment->description(), $comment->creationDate()->format('Y-m-d H:i:s'), $comment->isVerified()));
	}

	public function delete($id){ //delete
		$prepare = Database::getInstance()->prepare("DELETE FROM comment WHERE id = ?"); 
		return $prepare->execute(array($id));
	}

	public function update($comment){ //update
		$prepare = Database::getInstance()->prepare("UPDATE comment SET idPost=?, idUser=?, description=?, creationDate=?, isVerified=? WHERE id=?"); 
		return $prepare->execute(array($comment->idPost(), $comment->idUser(), $comment->description(), $comment->creationDate()->format('Y-m-d H:i:s'), $comment->isVerified(), $comment->id()));
	}

	public function getComments(){ //get all comment by DESC (id)
		$prepare = Database::getInstance()->prepare("SELECT * FROM comment ORDER BY id DESC"); 
		$prepare->execute();

		$commentsList = array();
		while ($row = $prepare->fetch(PDO::FETCH_OBJ)) {
			$commentsList[] = $this->buildFromRow($row);
		}

		return $commentsList;
	}

	public function getUnverifiedComments(){ //get unverified comment
		$prepare = Database::getInstance()->prepare("SELECT * FROM comment WHERE isVerified='0'"); 
		$prepare->execute();

		$commentsList = array();
		while ($row = $prepare->fetch(PDO::FETCH_OBJ)) {
			$commentsList[] = $this->buildFromRow($row);
		}

		return $commentsList;
	}
	
    public function getById($id){ //get comment by id
		$prepare = Database::getInstance()->prepare("SELECT * FROM comment WHERE id = ?"); 
		$prepare->execute(array($id));

		if($row = $prepare->fetch(PDO::FETCH_OBJ)){
			return $this->buildFromRow($row);
		}else{
			return false;
		}
	}
	
    public function getByIdPost($idPost){ //get comment by id post 
		$prepare = Database::getInstance()->prepare("SELECT * FROM comment WHERE idPost = ?"); 
		$prepare->execute(array($idPost));

		$commentsList = array();
		while ($row = $prepare->fetch(PDO::FETCH_OBJ)) {
			$commentsList[] = $this->buildFromRow($row);
		}

		return $commentsList;
	}
}
