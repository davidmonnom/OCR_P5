<?php
require_once('model/entity/post.php');

class PostManager {
	private function buildFromRow($row){
		return new Post($row->id, $row->idUser, $row->title, $row->subject, $row->description, $row->creationDate, $row->modifyDate, $row->isVerified);
	}
	
	public function getPosts(){
		$prepare = Database::getInstance()->query("SELECT * FROM post"); 

		$postsList = array();
		while ($row = $prepare->fetch(PDO::FETCH_OBJ)) {
			$postsList[] = $this->buildFromRow($row);
		}

		return $postsList;
	}

	public function getById($id){
		$prepare = Database::getInstance()->prepare("SELECT * FROM post WHERE id = ?"); 
		$prepare->execute(array($id));

		if($row = $prepare->fetch()){
			return $this->buildFromRow($row);
		}else{
			return false;
		}
	}

	public function add($post){
		$prepare = Database::getInstance()->prepare("INSERT INTO post(idUser, title, subject, description, creationDate, isVerified) VALUES(?, ?, ?, ?, ?, ?)"); 
		return $prepare->execute(array($post->idUser(), $post->title(), $post->subject(), $post->description(), $post->creationDate(), $post->isVerified()));
	}
}
