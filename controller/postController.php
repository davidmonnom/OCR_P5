<?php
require_once("controller/controller.php");
require_once("model/postManager.php");

class PostController extends Controller{
    private $_postMan;
    
    public function __construct(){
        parent::__construct();
        $this->_postMan = new PostManager();
    }
    
    public function listPosts(){
        $this->view()->render("listPostsView.php", array(
            'postsList' => $this->postMan()->getPosts()
        ));
    }

    public function viewPost(){
        echo "list";
    }

    public function createPost(){

    }

    public function deletePost(){

    }

    public function postMan(){
        return $this->_postMan;
    }
}