<?php
require_once('model/entity/post.php');

class PostManager {
	private function buildFromRow($row){
		$creationDate = DateTime::createFromFormat('Y-m-d H:i:s', $row->creationDate);
		$modifyDate = DateTime::createFromFormat('Y-m-d H:i:s', $row->modifyDate);
		return new Post($row->id, $row->idUser, $row->title, $row->subject, $row->description, $creationDate, $modifyDate, $row->isVerified);
	}
	
	public function delete($id){
		$prepare = Database::getInstance()->prepare("DELETE FROM post WHERE id = ?"); 
		return $prepare->execute(array($id));
	}

	public function update($post){
		$prepare = Database::getInstance()->prepare("UPDATE post SET idUser=?, title=?, subject=?, description=?, creationDate=?, modifyDate=?, isVerified=? WHERE id = ?"); 
		return $prepare->execute(array($post->idUser(), $post->title(), $post->subject(), $post->description(), $post->creationDate()->format('Y-m-d H:i:s'), $post->creationDate()->format('Y-m-d H:i:s'), $post->isVerified(), $post->id()));
	}

	public function getPosts(){
		$prepare = Database::getInstance()->query("SELECT * FROM post ORDER BY id DESC"); 

		$postsList = array();
		while ($row = $prepare->fetch(PDO::FETCH_OBJ)) {
			$postsList[] = $this->buildFromRow($row);
		}

		return $postsList;
	}

	public function getUnverifiedPosts(){
		$prepare = Database::getInstance()->query("SELECT * FROM post WHERE isVerified='0'"); 

		$postsList = array();
		while ($row = $prepare->fetch(PDO::FETCH_OBJ)) {
			$postsList[] = $this->buildFromRow($row);
		}

		return $postsList;
	}

	public function getById($id){
		$prepare = Database::getInstance()->prepare("SELECT * FROM post WHERE id = ?"); 
		$prepare->execute(array($id));

		if($row = $prepare->fetch(PDO::FETCH_OBJ)){
			return $this->buildFromRow($row);
		}else{
			return false;
		}
	}

	public function add($post){
		$prepare = Database::getInstance()->prepare("INSERT INTO post(idUser, title, subject, description, creationDate, isVerified) VALUES(?, ?, ?, ?, ?, ?)"); 
		return $prepare->execute(array($post->idUser(), $post->title(), $post->subject(), $post->description(), $post->creationDate()->format('Y-m-d H:i:s'), $post->isVerified()));
	}
}
