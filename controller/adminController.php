<?php 
require_once("controller/controller.php");

class AdminController extends Controller {
    public function index(){
        if($_SESSION["user"]->isAdmin() == 1){
            $this->view()->render('adminView.php', array(
                'postsList' => $this->postMan()->getPosts(),
                'commentsList' => $this->commMan()->getComments()
            ));
        }
    }
}