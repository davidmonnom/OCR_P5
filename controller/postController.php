<?php
require_once("controller/controller.php");

class PostController extends Controller{
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
            $return = $this->postMan()->add(new Post(null, $_SESSION["user"]->id(), $title, $subject, $description, date("Y-m-d H:i:s"), null, 0));

            $result["status"] = $return;
            echo json_encode($result);
        }else{
            $this->view()->render('createPostView.php');
        }
    }

    public function deletePost(){

    }
}