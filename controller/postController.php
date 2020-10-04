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
        $this->view()->render('listPostsView.php', array(
            'postsList' => $this->postMan()->getPosts()
        ));
    }

    public function viewPost(){
        echo "list";
    }

    public function createPost($title=NULL, $subject=NULL, $description=NULL){
        if(!empty($title) && !empty($subject) && !empty($description)){
            // $this->postMan()->add(new Post($user, $title, $subject, $description);
        }else{
            $this->view()->render('createPostView.php');
        }
    }

    public function deletePost(){

    }

    public function postMan(){
        return $this->_postMan;
    }
}