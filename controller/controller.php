<?php
require_once("class/View.php");
require_once("model/userManager.php");
require_once("model/postManager.php");
require_once("model/commentManager.php");

class Controller{
    private $_view;
    private $_postMan;
    private $_userMan;
    private $_commentMan;

    public function __construct(){
        $this->_view = new View();
        $this->_postMan = new PostManager();
        $this->_commentMan = new CommentManager();
        $this->_userMan = new UserManager();
    }

    public function view(){
        return $this->_view;
    }
    public function userMan(){
		return $this->_userMan;
    }
    public function postMan(){
		return $this->_postMan;
    }
    public function commMan(){
		return $this->_commMan;
	}
}