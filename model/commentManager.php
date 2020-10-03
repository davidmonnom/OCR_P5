<?php
require_once('model/entity/comment.php');

class CommentManager {
    private function buildFromRow($row){
		return new Comment($row->id, $row->idPost, $row->idUser, $row->description, $row->creationDate, $row->isVerified)
	}
	
    public function getById($id){
		$prepare = Database::getInstance()->prepare("SELECT * FROM comments WHERE id = ?"); 
		$prepare->execute(array($id));

		if($row = $prepare->fetch()){
			return $this->buildFromRow($row);
		}else{
			return false;
		}
	}
	
    public function getByIdPost($idPost){
		$prepare = Database::getInstance()->prepare("SELECT * FROM comments WHERE idPost = ?"); 
		$prepare->execute(array($idPost));

		$commentsList = array();
		while ($row = $prepare->fetch(PDO::FETCH_OBJ)) {
			$commentsList[] = $this->buildFromRow($row);
		}

		return $commentsList;
    }
}
