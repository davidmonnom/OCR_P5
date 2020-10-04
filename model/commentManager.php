<?php
require_once('model/entity/comment.php');

class CommentManager {
    private function buildFromRow($row){
		$creationDate = DateTime::createFromFormat('Y-m-d H:i:s', $row->creationDate);
		return new Comment($row->id, $row->idPost, $row->idUser, $row->description, $creationDate, $row->isVerified);
	}

	public function delete($id){
		$prepare = Database::getInstance()->prepare("DELETE FROM comment WHERE id = ?"); 
		return $prepare->execute(array($id));
	}

	public function update($comment){
		$prepare = Database::getInstance()->prepare("UPDATE comment SET idPost=?, idUser=?, description=?, creationDate=?, isVerified=? WHERE id=?"); 
		return $prepare->execute(array($comment->idPost(), $comment->idUser(), $comment->description(), $comment->creationDate()->format('Y-m-d H:i:s'), $comment->isVerified(), $comment->id()));
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

		return $commentsList;
	}
	
    public function getById($id){
		$prepare = Database::getInstance()->prepare("SELECT * FROM comment WHERE id = ?"); 
		$prepare->execute(array($id));

		if($row = $prepare->fetch(PDO::FETCH_OBJ)){
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
